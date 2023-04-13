<form method="POST" action="https://sandbox-kit.espay.id/espaysingle/paymentlist">
    @foreach($seedForm as $k => $v)
    <input type="text" name="{{ $k }}" value="{{ $v }}" />
    @endforeach
    <input type="submit" name="post" class="submit buy button" value="Confirm and Pay" />
 </form>