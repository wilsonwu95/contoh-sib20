<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionsModel;
use App\Models\TransactionDetailsModel;
use App\Models\ProductModel;

class TransactionsController extends Controller
{
    //


    function viewAdd() {
        return view('transactions.add');
    }

    function submitTrans(Request $request) {
        \DB::beginTransaction();
        try {
            $insertTrans = [
                'invoice' => $request->invoice,
                'date' => date("Y-m-d", strtotime($request->date))
            ];

            $trans = TransactionsModel::create($insertTrans);

            $insertDet = [];
            for ($i=0; $i < count($request->product_id); $i++) { 
                $insertDet[] = [
                    'transactions_id' => $trans->id,
                    'products_id' => $request->product_id[$i],
                    'qty' => $request->qty[$i],
                    'price' => $request->price[$i]
                ];
            }

            TransactionDetailsModel::insert($insertDet);

            \DB::commit();
            return redirect('/transactions/add');
        } catch (Exception $e) {
            \DB::rollback();

            return redirect('/transactions/add')->withErrors(['error'=> "Something went wrong"]);
        }
    }

    function viewEdit($id)
    {
        $data = TransactionsModel::with(['TransDetail'])->where('id', $id)->first();
        $product = ProductModel::all();
        return view('transactions.edit', compact('data', 'product'));
    }

    function submitEdit(Request $request)
    {
        \DB::beginTransaction();
        $id = request('id');
        try {
            //update transaction
            $update = [
                'invoice' => $request->invoice,
                'date' => date('Y-m-d', strtotime($request->date))
            ];
            TransactionsModel::where('id', $id)->update($update);

            //delete trans detail
            TransactionDetailsModel::where('transactions_id', $id)->delete();

            //re-insert trans detail
            $insertDet = [];
            for ($i=0; $i < count($request->product_id); $i++) { 
                $insertDet[] = [
                    'transactions_id' => $id,
                    'products_id' => $request->product_id[$i],
                    'qty' => $request->qty[$i],
                    'price' => $request->price[$i]
                ];
            }

            TransactionDetailsModel::insert($insertDet);
            
            \DB::commit();
            return redirect('/transactions/edit/'.$id);
        } catch (Exception $e) {
            \DB::rollback();
            return redirect('/transactions/edit/'.$id)->withErrors(['error'=> "Something went wrong"]);
        }
    }

    function delete($id)
    {
        TransactionDetailsModel::where('transactions_id', $id)->delete();
        TransactionsModel::where('id', $id)->delete();

        //redirect kembali ke view blade
    }
}
