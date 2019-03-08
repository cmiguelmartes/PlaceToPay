<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente\PlaceToPay;
use App\Cache\BankListCache;
use App\CreateTransactionResult;

class PlaceToPayController extends Controller
{
    public function backList()
    {

        $list = (new PlaceToPay())->getBankList();
        if(isset($list->getBankListResult))
        {
            return $list->getBankListResult->item;
        }
    }

    public function formulario()
    {
        $bankListCache = new BankListCache();
        $backList = array();
        if(!$bankListCache->isHit())
        {
            $list = (new PlaceToPay())->getBankList();

            if(isset($list->getBankListResult))
            {
                $backList = $list->getBankListResult->item;
                $bankListCache->set($backList);
            }
        }else{
            $backList = unserialize($bankListCache->get());
        }

        return view('pago.formulario',["bankList"=>$backList]);
    }

    public function createTransaction(Request $request)
    {
        try{
            $bankCode = $request->input("bank_list");
            $persona = array(
                "documentType"=>$request->input("document_type"),
                "document"=>$request->input("document"),
                "firstName"=>$request->input("names"),
                "lastName"=>$request->input("last_names"),
                "company"=>$request->input("company"),
                "emailAddress"=>$request->input("email"),
                "address"=>$request->input("address"),
                "city"=>$request->input("address"),
                "province"=>$request->input("province"),
                "country"=>$request->input("country"),
                "phone"=>$request->input("phone"),
                "mobile"=>$request->input("mobile"),
                "postalCode"=>$request->input("postalCode")
            );
            $transaction = (new PlaceToPay())->createTransaction($bankCode,$persona);
            $transaction = $transaction->createTransactionResult;
            $result = array(
                "name"=>(isset($transaction->returnCode))?$transaction->returnCode:"-",
                "bank_url"=>(isset($transaction->bankURL))?$transaction->bankURL:"-",
                "trazability_code"=>(isset($transaction->trazabilityCode))?$transaction->trazabilityCode:"-",
                "transaction_cycle"=>(isset($transaction->transactionCycle))?$transaction->transactionCycle:0,
                "transaction_id"=>(isset($transaction->transactionID))?$transaction->transactionID:0,
                "session_id"=>(isset($transaction->sessionID))?$transaction->sessionID:"0",
                "bank_currency"=>(isset($transaction->bankCurrency))?$transaction->bankCurrency:"-",
                "bank_factor"=>(isset($transaction->bankFactor))?$transaction->bankFactor:0,
                "response_code"=>(isset($transaction->responseCode))?$transaction->responseCode:0,
                "response_reasonCode"=>(isset($transaction->responseReasonCode))?$transaction->responseReasonCode:"-",
                "response_reason_text"=>(isset($transaction->responseReasonText))?$transaction->responseReasonText:"-"
            );
            CreateTransactionResult::create($result);
            if($result["bank_url"] != "-"){
                return redirect($result["bank_url"]);
            }else{
                return array("error"=>false,"message"=>"Transacción creada");
            }
            
            
        }catch(\Exception $e)
        {
            return array("error"=>true,"message"=>$e->getMessage());
        }
    }
}
