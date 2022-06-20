@extends('layout')

@section('content')
    <form class="kWXsT" method="POST">
        <div class="eE-OA">
            <aside class="sxIVS  ">
                <label for="pepName">Nome</label>
            </aside>
            <div class="ada5V">
                <div class="AC7dPH" style="width: 100%; max-width: 355px;">
                    <input aria-required="false" id="pepName" placeholder="Nome" type="text" class="JLJ-B zyHYP"
                        value="Rodrigo Capitão">
                    <div class="w" style="width: 100%; max-width: 355px;">
                        <div class="A">
                            <div class="A">
                                Ajude as pessoas a descobrir sua conta usando o nome pelo qual você é conhecido: seu nome
                                completo, apelido ou nome comercial.
                            </div>
                        </div>
                        <div class="B">
                            Você pode alterar o seu nome apenas duas vezes a cada 14 dias.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="eE-OA">
            <aside class="sxIVS  ">
                <label for="pepUsername">Nome de usuário</label>
            </aside>
            <div class="ada5V">
                <div class="A" style="width: 100%; max-width: 355px;">
                    <input aria-required="true" id="pepUsername" placeholder="Nome de usuário" type="text"
                        class="JLJ-B zyHYP" value="rcapitao_22">
                    <div class="" style="width: 100%; max-width: 355px;">
                        <div class="">
                            <div class="">Na maioria dos casos,
                                você poderá alterar seu nome de usuário novamente para rcapitao_22 por mais 14 dias. <a
                                    aria-label="Saiba mais sobre como alterar seu nome de usuário" class="cRH0J _6u7OO"
                                    href="https://help.instagram.com/876876079327341" rel="nofollow noopener noreferrer"
                                    target="_blank">Saiba mais</a></div>
                        </div>
                        <div class=""></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="eE-OA">
            <aside class="sxIVS  "><label for="pepWebsite">Site</label></aside>
            <div class="ada5V">
                <div class="" style="width: 100%; max-width: 355px;"><input aria-required="false" id="pepWebsite"
                        placeholder="Site" type="text" class="JLJ-B zyHYP" value="https://youtu.be/GAe68eukqmo"></div>
            </div>
        </div>
        <div class="eE-OA">
            <aside class="sxIVS  "><label for="pepBio">Biografia</label></aside>
            <div class="ada5V">
                <textarea class="p7vTm" id="pepBio">19 y/o</textarea>
            </div>
        </div>
        <div class="eE-OA">
            <aside class="sxIVS  tvweK"><label></label></aside>
            <div class="ada5V">
                <div class="" style="width: 100%; max-width: 355px;">
                    <div class="">
                        <h2 class="JJF77">Informações pessoais</h2>
                    </div>
                    <div class="">Forneça suas informações
                        pessoais, mesmo se a conta for usada para uma empresa, um animal de estimação ou outra coisa. Elas
                        não farão parte do seu perfil público.</div>
                </div>
            </div>
        </div>
        <div class="eE-OA">
            <aside class="sxIVS  "><label for="pepEmail">Email</label></aside>
            <div class="ada5V">
                <div class="" style="width: 100%; max-width: 355px;"><input aria-required="false" id="pepEmail"
                        placeholder="Email" type="text" class="JLJ-B zyHYP" value="rodrigofilipecapitao@gmail.com"></div>
            </div>
        </div>
        <div class="eE-OA">
            <aside class="sxIVS  "><label for="pepPhone Number">Telefone</label></aside>
            <div class="ada5V">
                <div class="" style="width: 100%; max-width: 355px;"><input aria-required="false" id="pepPhone Number"
                        placeholder="Telefone" type="text" class="JLJ-B zyHYP" value="+351 910 599 057"></div>
            </div>
        </div>
        <div class="">
            <div class="">
                <div class="eE-OA">
                    <aside class="sxIVS  "><label for="pepGender">Gênero</label></aside>
                    <div class="ada5V">
                        <div class="" style="max-width: 355px;"><button class="sqdOP yWX7d  _4pI4F   _8A5w5    "
                                type="button"><input id="pepGender" readonly="" type="text" class="F0B8Y zyHYP"
                                    value="Masculino"></button></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="eE-OA">
            <aside class="sxIVS  "><label>Sugestões de contas similares</label></aside>
            <div class="ada5V">
                <div class="Np4RR" id="pepChainingEnabled"><label class="U17kh PLphk " for="fb5376cce4c784"><input
                            class="tlZCJ" id="fb5376cce4c784" type="checkbox" value="" checked="">
                        <div class="mwD2G"></div>
                        <div class="" style="width: 40%;">Inclua sua conta ao recomendar contas similares que as
                            pessoas talvez
                            queiram seguir.<a aria-label="Saiba mais sobre as sugestões de contas semelhantes"
                                class="cRH0J" href="https://help.instagram.com/530450580417848"
                                rel="nofollow noopener noreferrer" target="_blank">[?]</a></div>
                    </label></div>
            </div>
        </div>
        <div class="eE-OA">
            <aside class="s"><label></label></aside>
            <div class="ada5V">
                <div class="fi8zo"><button class="h" disabled="" type="button">Enviar</button>
                    <div class="M8zL6"><button class="3z" type="button">Desativar minha conta
                            temporariamente</button></div>
                </div>
            </div>
        </div>
    </form>
@endsection
