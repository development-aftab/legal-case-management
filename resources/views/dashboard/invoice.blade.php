@extends('layouts.master')


@section('content')
    <div style="margin: 20px; float: left;">
        <div style="font-family: monospace;padding-bottom: 40px;width: 100%;">
            <div style="float: left">
                <div style="width: 112px;height: 80px;margin-right: 40px;float: left">
                    <img src="{{asset('website/assets/images/big_logo.png')}}" alt="" style="width: 100%;height:100%;object-fit: contain;object-position: center;">
                </div>
                <div style="float: right;">
                    <h3 style="margin: 0px;padding: 0px;font-size: 20px;font-weight: bold;">Legal Case Management</h5>
                    <div style="">
                        <span><b style="font-size: 15px;">Address : </b>3 Harris Street, San Fernando</span><br>
                        <span><b style="font-size: 15px;">Phone : </b>098-2620/123-5834</span><br>
                        <span><b style="font-size: 15px;">Email : </b>spacefiller@email.com</span><br>
                    </div>
                </div>    
            </div>
        </div>
        <div style="float:left;border-top: 2px solid rgba(213, 175, 42,1);">
            <div style="width:100%;float:left;justify-content: space-between;margin-top: 50px;">
                <div style="float:left;border: 2px solid rgba(213, 175, 42,0.3);padding: 10px;">
                    <h4 style="font-size:15px;margin: 0px;">Bill To:</h4>
                    <br>
                    <div>
                        <h4 style="font-size:15px;margin: 0px;">Whomever</h4>
                        <h4 style="font-size:15px;margin: 0px;">Public Service Association</h4>
                        <h4 style="font-size:15px;margin: 0px;">No. 89 Abercromby Street</h4>
                        <h4 style="font-size:15px;margin: 0px;">PORT OF SPAIN</h4>
                    </div>
                </div>
                <table style="float:right;padding: 10px;text-align: left;">
                    <tr>
                        <th>
                            <h4 style="font-size:15px;margin: 0px;">Date : </h4>
                        </th>
                        <td><span>7/2/2023</span></td>
                    </tr>
                    <tr>
                        <th>
                            <h4 style="font-size:15px;margin: 0px;">VAT No : </h4>
                        </th>
                        <td><span>632442</span></td>
                    </tr>
                    <tr>
                        <th>
                            <h4 style="font-size:15px;margin: 0px;">Invoice No : </h4>
                        </th>
                        <td><span>02</span></td>
                    </tr>
                </table>
            </div>
            <div>
                <h4 style="float:left;font-size:15px;display: -webkit-box;-webkit-line-clamp: 1;-webkit-box-orient: vertical;overflow: hidden;text-overflow: ellipsis;text-align: left;">Subject : Re : Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatem illum numquam commodi consequatur modi, </h4>
            </div>
            <table border="1" style="border-color: #D5AF2A;width: 100%">
                <thead style="background: #333333;color: #D5AF2A;height: 50px;">
                    <tr>
                        <th style="color: #D5AF2A;text-align: center;width: 100px;">Item</th>
                        <th style="color: #D5AF2A;text-align: center;">Description</th>
                        <th style="color: #D5AF2A;text-align: center;">Legal Fees</th>
                        <th style="color: #D5AF2A;text-align: center;">Disimbursments</th>
                        <th style="color: #D5AF2A;text-align: center;width: 100px;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="vertical-align: top;text-align: center;">
                            1
                        </td>
                        <td style="vertical-align: top;">
                            To:
                            <ul style="margin: 0">
                                <li>
                                    conference and taking instructions,
                                </li>
                                <li>
                                    reviewing of instructions and legal
                                    advice with Junior Counsel,
                                </li>
                                <li>
                                    reviewing and settling of all
                                    documents;
                                </li>
                                <li>
                                    advice by Senior Counsel;
                                </li>
                                <li>
                                    preparation and presentation of the
                                    case;
                                </li>
                                <li>
                                    legal research; and
                                </li>
                                <li>
                                    general care and conduct of the
                                    matter.
                                </li>
                            </ul>
                            <div style="display: inline-block;">
                                <ul style="list-style: none;padding: 0px;">
                                    <li>
                                        Senior Counsel: 
                                    </li>
                                    <li>
                                        Junior Counsel: 
                                    </li>
                                    <li>
                                        Instructing Attorney: 
                                    </li>
                                </ul>
                            </div>
                            <div style="display: inline-block">
                                <ul style="list-style: none;padding: 0px;">
                                    <li>
                                        $150,000
                                    </li>
                                    <li>
                                        $360,00
                                    </li>
                                    <li>
                                        $503,900
                                    </li>
                                </ul>
                            </div>
                        </td>
                        <td  style="vertical-align: top;text-align: center;">
                            $320,000
                        </td>
                        <td style="vertical-align: top;">
                            
                        </td>
                        <td style="vertical-align: top;">
                            
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="3">Sub Total</td>
                        <td style="text-align: center;">$320</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="3">VAT 12.5%</td>
                        <td style="text-align: center;">$320</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="3">Total</td>
                        <td style="text-align: center;">$320</td>
                    </tr>
                </tbody>
            </table>
            <div style="padding-top:20px;margin-top:80px;float: left; border-top: 1px dashed black">
                <p style="font-size:15px;margin:0px;padding: 0;"><b>Issued By : </b></p>
                <p style="font-size:15px;margin:0px;padding: 0;"><b>Free Law Chambers</b></p>
            </div>
        </div>
    </div>
@endsection