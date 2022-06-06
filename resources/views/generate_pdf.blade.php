<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
</head>
<body style="margin:0;padding:0;width:100%;">

  <h5>{{ $type }}</h5>

  <h5 style="margin-top:4px;"><b>Date: {{ $date }}</b></h5>

  <div style="width:100%;margin-top:20px;display:flex;">
    <div style="width:65%;">
      <p><b>{{ $ownerBusinessName }}</b></p>
      <span>{{ $ownerBusinessAddress }}</span><br>
      <span>{{ $ownerTaxID }}</span><br>
      {{-- <span>{{ $ownerBankInformation }}</span><br> --}}
      {{-- <span>{{ $ownerBankName }}</span><br> --}}
    </div>
    <div style="width:35%;float:right;">
      <p><b>{{ $customerBusinessName }}</b></p>
      <span>{{ $customerBusinessAddress }}</span><br>
      <span>{{ $customerBusinessCity }}</span><br>
      <span>{{ $customerTaxID }}</span><br>
      {{-- <span>{{ $customerBankInformation }}</span><br> --}}
    </div>
  </div>

  <div style="margin-top:20px;"></div>

  <div>
     {{-- <p>{{$content}}</p> --}}
     <table style="width:100%;">
       <thead>
         <tr>
           <th style="width:35%;border-bottom:1px solid black;">Name of service or item</th>
           <th style="width:15%;border-bottom:1px solid black;">Amount used</th>
           <th style="width:15%;border-bottom:1px solid black;">Unit Cost ($)</th>
           <th style="width:15%;border-bottom:1px solid black;">Taxes ($)</th>
           <th style="width:15%;border-bottom:1px solid black;">Cost ($)</th>
         </tr>
       </thead>
       <tbody style="text-align:center;">

        @php 
          $countTotalSum = 0;
          $countTotalTaxSum = 0;    
        @endphp

        @foreach($parts as $part)
         <tr>
           <td style="border-bottom:1px solid black;">{{ $part->part_title }}</td>
           <td style="border-bottom:1px solid black;">{{ $part->quantity }}</td>
           <td style="border-bottom:1px solid black;">{{ $part->unit_cost }}</td>
           <td style="border-bottom:1px solid black;">{{ $part->tax_cost }} ({{ $part->taxes }}%)</td>
           <td style="border-bottom:1px solid black;">{{ $part->total_cost }}</td>
           @php $countTotalSum+=$part->total_cost; @endphp
           @php $countTotalTaxSum+=$part->tax_cost; @endphp
         </tr>
         @endforeach

        {{-- [{"part_title":"Tires 19\"","quantity":"20.00","unit_cost":"400",
        "discount":"0.00","taxes":"10","total_cost":"8800.00","tax_cost":"800.00"}] --}}
        
        {{-- [{"mechanic":"9","job":"ghghhjgj","job_hours":"10.00","discount":"0.00",
        "taxes":"10","total_cost":"919.00","hour_cost":91.9,"tax_cost":"83.60","human_who_clicked_save":1,
        "date_saved":"2021-07-31 06:05"}] --}}

         @foreach($actions as $action)
         <tr>
            <td style="border-bottom:1px solid black;">{{ $action->job }}</td>
            <td style="border-bottom:1px solid black;">{{ $action->job_hours }} hours</td>
            <td style="border-bottom:1px solid black;">{{ $action->hour_cost }}</td>
            <td style="border-bottom:1px solid black;">{{ $action->tax_cost }} ({{ $action->taxes }}%)</td>
            <td style="border-bottom:1px solid black;">{{ $action->total_cost }}</td>
            @php $countTotalSum+=$action->total_cost; @endphp
            @php $countTotalTaxSum+=$action->tax_cost; @endphp
          </tr>
         @endforeach

         <tr>
           <td style="border-bottom:1px solid black;"><b>Total Cost</b></td>
           <td style="border-bottom:1px solid black;"></td>
           <td style="border-bottom:1px solid black;"></td>
           <td style="border-bottom:1px solid black;"></td>
           <td style="border-bottom:1px solid black;"><b>$ {{ $countTotalSum }}</b></td>
         </tr>

         <tr>
          <td style="border-bottom:1px solid black;"><b>Total Taxes</b></td>
          <td style="border-bottom:1px solid black;"></td>
          <td style="border-bottom:1px solid black;"></td>
          <td style="border-bottom:1px solid black;"></td>
          <td style="border-bottom:1px solid black;"><b>$ {{ $countTotalTaxSum }}</b></td>
        </tr>

       </tbody>
     </table>
  </div>

</body>
</html>