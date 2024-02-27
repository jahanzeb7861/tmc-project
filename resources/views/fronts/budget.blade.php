@extends('layouts.app') @section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
                max-width: 100vw;
                margin: 20px;
                box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
                background-color: #fff;
                border-radius: 10px;
            }

            th,
            td {
                padding: 15px;
                text-align: left;
                border: 1px solid #ddd;
            }

            th {
                background-color: #22574D !important;
                color: #ecf0f1;
            }

            tr:hover {
                background-color: #f5f5f5;
            }

            .container {
                padding-left: 50px;
                padding-right: 130px;
            }
            th,td{
                    text-transform: capitalize;
            }
        </style>
    </head>

    <body>
        <div class="container">
 <table>
        <thead>
          <tr>
            <th>No.	Details</th>
            <th>Details</th>
            <th>Download</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>20-01-2024</td>
            <td>Annual budgret for FY 2023-24</td>
            <td>Download</td>
          </tr>
                 <tr>
            <td>20-01-2024</td>
            <td>Annual budgret for FY 2023-24</td>
            <td>Download</td>
          </tr>
          
        </tbody>
      </table>
        </div>
    </body>

    </html>
@endsection
