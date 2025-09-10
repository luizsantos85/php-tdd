# Projeto de Estudo (PHP TDD)

Este repositório contém um projeto de estudo / teste em PHP com foco em TDD e execução em ambiente Docker.

Objetivo

-  Servir como espaço para experimentar conceitos de TDD em PHP.

-  Testar execução da aplicação dentro de containers Docker (PHP-FPM + Nginx).

Como rodar (rápido)

1. Certifique-se de ter Docker e Docker Compose instalados.

1. No diretório do projeto, execute:

```bash
docker compose up -d --build
```

1. Abra no navegador: `http://localhost:8888`

## Notas importantes

-  O ambiente normalmente usa um serviço PHP-FPM (container `app`) e Nginx configurado para encaminhar requisições FastCGI para `app:9000`.

-  Se você renomear o serviço PHP no `docker-compose.yml`, atualize também a configuração do Nginx (`docker/nginx/default.conf`) para o nome correto do upstream.

-  O diretório `public` é usado como `root` pelo Nginx — confirme que sua aplicação possui `public/index.php`.

## Problemas comuns

-  Erro "host not found in upstream \"php\"": significa que a configuração do Nginx aponta para `php` mas o serviço no compose tem outro nome (ex.: `app`).

-  Permissões de arquivos: se receber 403/500, verifique permissões do host montado no volume e ajuste dono/permissões no Dockerfile ou no host.

Contribuições e notas finais

-  Este é apenas um ambiente de estudo; sinta-se à vontade para modificar e testar (ex.: instalar extensões PHP, adicionar testes unitários, ou melhorar o Dockerfile).

-  Para dúvidas ou melhorias, descreva o que alterou e os logs observados para facilitar o diagnóstico.

---