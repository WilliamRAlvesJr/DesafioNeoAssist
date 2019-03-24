# Desafio desenvolvedor backend NeoAssist

### Como exeutar:

    - Requisitos:
        - XAMPP v3.2.3

    - Colocar o projeto em C:\xampp\htdocs
    - Rodar o modulo apache do XAMPP
    - Acessar a URL http://localhost/desafioneoassist/

### Observações:
    
* Arquivo JSON

    O projeto pediu para que a pontuação fosse armazenada no json tickets.json, porém não fiz isso, 
    preferi manter arquivo original intacto na pasta resources. 

    Um novo json com o nome tickets_points.json é criado ao rodar o projeto (podem excluir para validar). 
    Ele está localizado na pasta target, e é gerado a partir do arquivo tickets.json.
    Nesse novo arquivo, as pontuações são colocadas para cada mensagem.
<br/><br/>

* Modal com mensagem do cliente

    Algo que pode passar despercebido é o botão na listagem de assunto, ao clicar em qualquer assunto,
    uma modal com a mensagem do cliente é mostrada na tela.
