@extends('layouts.app')


@section('content')
<style>
  .payslip-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
    gap: 20px;
    margin-top: 20px;
  }

  .payslip-card {
    background: #ffffff;
    padding: 15px;
    border-radius: 12px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.08);
    text-align: center;
    transition: transform 0.2s ease;
  }

  .payslip-card:hover {
    transform: translateY(-3px);
  }

  .pdf-icon {
    width: 50px;
    margin-bottom: 10px;
  }

  .payslip-text {
    font-size: 13px;
  }

  .download-link {
    display: inline-block;
    margin-top: 5px;
    color: #007BFF;
    font-weight: 500;
    font-size: 12px;
    text-decoration: underline;
  }

  .section-title {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 15px;
  }
</style>

<div class="container">
  <h4 class="section-title">List Data Payroll</h4>

  @if(isset($payslips) && is_array($payslips))
    <div class="payslip-grid">
        @foreach($payslips as $payslip)
            <div class="payslip-card">
                <img src="{{ asset('assets/pdf-icon.png') }}" alt="PDF" class="pdf-icon">
                <div class="payslip-text">
                <strong>{{ $payslip['filename'] }}</strong><br>
                <span>{{ $payslip['date'] }}</span><br>
                <a href="{{ route('employees.payslip.download', ['filename' => $payslip['filename']]) }}" class="download-link">Klik untuk Download</a>
                </div>
            </div>
        @endforeach
    </div>
  @else
    <p>Tidak ada data payslip.</p>
  @endif
</div>
@endsection
