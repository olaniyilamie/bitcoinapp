<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;

class BankController extends Controller
{
    //
    public function insertBankName(){
        $banks=[
            ['U AND C MICROFINANCE BANK'],
            ['3LINE CARD MANAGEMENT LIMITED'],
            ['9 PAYMENT SERVICE BANK'],
            ['AB MICROFINANCE BANK'],
            ['ABBEY MORTGAGE BANK'],
            ['ABOVE ONLY MICROFINANCE BANK'],
            ['ABU MICROFINANCE BANK'],
            ['ABUCOOP MICROFINANCE BANK'],
            ['ACCELEREX NETWORK'],
            ['ACCESS BANK PLC'],
            ['ACCESSMONEY'],
            ['ACCESSYELLO AND BETA'],
            ['ACCION MICROFINANCE BANK'],
            ['ADA MFB'],
            ['ADDOSSER MICROFINANCE BANK'],
            ['ADEYEMI COLLEGE STAFF MICROFINANCE BANK'],
            ['ADVANS LA FAYETTE MFB'],
            ['AFEKHAFE MICROFINANCE BANK'],
            ['AG MICROFINANCE BANK'],
            ['AGOSASA MFB'],
            ['AGOSASA MICROFINANCE BANK'],
            ['AL-BARAKAH MICROFINANCE BANK'],
            ['AL-HAYAT MICROFINANCE BANK'],
            ['ALEKUN MICROFINANCE BANK'],
            ['ALERT MICROFINANCE BANK'],
            ['ALLWORKERS MICROFINANCE BANK'],
            ['ALPHA KAPITAL MICROFINANCE BANK'],
            ['AMAC MICROFINANCE BANK'],
            ['AMJU UNIQUE MICROFINANCE BANK'],
            ['AMML MFB'],
            ['ANCHORAGE MICROFINANCE BANK'],
            ['ANIOCHA MFB'],
            ['APEKS MICROFINANCE BANK'],
            ['APPLE MICROFINANCE BANK'],
            ['ARCA PAYMENTS COMPANY LIMITED'],
            ['ARISE MICROFINANCE BANK'],
            ['ASO SAVINGS AND LOANS'],
            ['ASSETMATRIX MICROFINANCE BANK'],
            ['ASSETS MICROFINANCE BANK'],
            ['ASTRAPOLARIS MICROFINANCE BANK'],
            ['AUCHI MICROFINANCE BANK'],
            ['AVUENEGBE MFB'],
            ['BAINES CREDIT MICROFINANCE BANK'],
            ['BALOGUN FULANI MICROFINANCE BANK'],
            ['BALOGUN GAMBARI MICROFINANCE BANK'],
            ['BANEX MICROFINANCE BANK'],
            ['BAOBAB MICROFINANCE BANK'],
            ['BAYERO MICROFINANCE BANK'],
            ['BC KASH MICROFINANCE BANK'],
            ['BENYSTA MICROFINANCE BANK'],
            ['BIPC MICROFINANCE BANK'],
            ['BLUEWHALES MICROFINANCE BANK'],
            ['BOCTRUST MICROFINANCE BANK'],
            ['BORGU MFB'],
            ['BOSAK MICROFINANCE BANK'],
            ['BOWEN MICROFINANCE BANK'],
            ['BRENT MICROFINANCE BANK'],
            ['BRETHREN MICROFINANCE BANK'],
        ];

        Bank::insert($banks);
    }
}
