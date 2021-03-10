<html>
    <head>
        <link href="{{ asset('assets/pdf/proposal.css') }}" rel="stylesheet" type="text/css">
        <style>
            @page {
                header: page-header;
                footer: page-footer;
            }
        </style>
    </head>
    <body>
    <htmlpageheader name="page-header">
        <div style="background-color: green; text-align: center; width: 100%;">
            <b style="font-size: 10px; color:black">#{{ $proposal->id }}</b>
        </div>
    </htmlpageheader>

    <div style="background-color: whitesmoke; width: 100%; height: 100%;">
      {!! $proposal->description !!}
    </div>

    <htmlpagefooter name="page-footer">
        <div style="background-color: green; text-align: center; width: 100%;">
            <b style="font-size: 20px; color:black">DATATECH BD LTD.</b>
        </div>
    </htmlpagefooter>
    </body>
</html>
