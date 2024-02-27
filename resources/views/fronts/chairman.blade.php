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
            .orgoheading{
                font-size:45px;
                font-weight:600;
            }
                        center {
    padding: 30px;
}
        </style>
    </head>

    <body>
        <div class="container">
            <center><h1 clas="orgoheading">Union Councils List</h1></center>
            
            <table>
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>UC</th>
                        <th>Name of UC</th>
                        <th>Chairman / Vice Chairman</th>
                        <th>Contact No</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($chairmans as $key => $chairman)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $chairman->UC }}</td>
                            <td>{{ $chairman->UC_name }}</td>
                            <td>{{ $chairman->chairman_name }}</td>
                            <td>{{ $chairman->contact }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>

    </html>
@endsection
