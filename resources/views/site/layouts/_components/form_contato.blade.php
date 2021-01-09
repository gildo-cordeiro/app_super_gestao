<form method="post" action="{{ route('site.contato') }}">
    @csrf
    <input type="text" placeholder="Nome" class="{{ $classe }}" name="nome">
    {{$errors->has('nome') ? $errors->first('nome'): ''}}
    <br>
    <input type="text" placeholder="Telefone" class="{{ $classe }}" name="telefone">
    {{$errors->has('telefone') ? $errors->first('telefone'): ''}}
    <br>
    <input type="text" placeholder="E-mail" class="{{ $classe }}" name="email">
    {{$errors->has('email') ? $errors->first('email'): ''}}
    <br>
    <select class="{{ $classe }}" name="motivo_contato">
        <option value="1">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $item => $motivo_contato)
            <option value="{{ $motivo_contato->id }}">{{$motivo_contato->motivo_contato}}</option>
        @endforeach
    </select>
    {{$errors->has('motivo_contato') ? $errors->first('motivo_contato'): ''}}
    <br>
    <textarea class="{{ $classe }}" name="mensagem">Preencha aqui a sua mensagem</textarea>
    {{$errors->has('mensagem') ? $errors->first('mensagem'): ''}}
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>
