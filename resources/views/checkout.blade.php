@extends('welcome')

@section('content')
<iframe id="sgoplus-iframe" sandbox="allow-same-origin allow-scripts allow-top-navigation allow-forms" src="" scrolling="no" frameborder="0"></iframe>

@endsection

@push('scripts')<script type="text/javascript">
    window.onload = function() {
        var data = {
            key: "c120ee852ac32f5ef97077276ac10e6c",
            paymentId: "{{$invoice}}",
            backUrl: "http://localhost:8000/",
            paymentAmount: 75000.00
        },
        sgoPlusIframe = document.getElementById("sgoplus-iframe");
        if (sgoPlusIframe !== null) sgoPlusIframe.src = SGOSignature.getIframeURL(data);
        SGOSignature.receiveForm();
    };
</script>
<script type="text/javascript" src="https://sandbox-kit.espay.id/public/signature/js"></script>

@endpush