<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CalculatorModel;

class CalculatorController extends BaseController
{
    public function index()
    {
        $calculatorModel = new CalculatorModel();
        $data['previousCalculations'] = $calculatorModel->findAll(); 
    
        return view('calculator', $data);
    }

    public function calculate()
    {
        $username = $this->request->getPost('username');
        $number1 = $this->request->getPost('number1');
        $number2 = $this->request->getPost('number2');
        $result = $number1 + $number2;

        $calculatorModel = new CalculatorModel();
        $existingRecord = $calculatorModel->where('username', $username)->first();
        if ($existingRecord) {
            return redirect()->to('/')->with('error', 'Username already exists.');
        }
    
        try {
            $calculatorModel->insert([
                'username' => $username,
                'number1' => $number1,
                'number2' => $number2,
                'result' => $result
            ]);
            return redirect()->to('/records');
        } catch (\Exception $e) {
            return redirect()->to('/')->with('error', 'Database error occurred: ' . $e->getMessage() . ' (Error code: ' . $e->getCode() . ')');
}
        }
}