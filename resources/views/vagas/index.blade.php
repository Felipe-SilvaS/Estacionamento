

@foreach (@$vagas as $vaga)
<p>nome_visitante:{{$vaga->nome_visitante}}</p>
<p>cpf:{{$vaga->cpf}}</p>
<p>placa:{{$vaga->placa}}</p>
<p>acesso: {{$vaga->acesso}}</p>
<p>status_pagamento: {{$vaga->status_pagamento}}</p>
<hr>
@endforeach


