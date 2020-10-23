@extends('layouts.dashboard')

@section('content')
    <div class="row justify-content-around">
        <div class="col-6">
            <div class="card card-bottom">
                <div class="card-header bg-dark text-white text-center text-uppercase">
                    Transactions
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Date</th>
                        <th scope="col">Machine</th>
                        <th scope="col">Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Wednesday, September 25th 11:00</th>
                        <td>Vask 1</td>
                        <td>10.00</td>
                    </tr>
                    <tr>
                        <td>Wednesday, September 25th 11:00</th>
                        <td>Vask 2</td>
                        <td>12.00</td>
                    </tr>
                    <tr>
                        <td>Friday, May 1st 11:00</th>
                        <td>Vask 3</td>
                        <td>12.00</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-center">
                            <a href="#">Load more</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-3">
            <div class="card card-bottom">
                <div class="card-header bg-dark text-white text-center text-uppercase">
                    Balance
                </div>
                <div class="card-body text-center">
                    <p class="h1">{{ number_format($balance, 2) }}</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card card-bottom">
                <div class="card-header bg-dark text-white text-center text-uppercase">
                    Version
                </div>
                <div class="card-body text-center">
                    <p class="card-text">{{ $version }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
