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

## Testes (PHPUnit + Mockery)

### Entrar no container (Composer / Testes)

Para executar comandos (Composer, PHPUnit) dentro do ambiente isolado use:

```bash
docker compose exec app bash
ou
docker-compose exec app bash
```

### Instalação das dependências

Se ainda não instalou as dependências (vendor não versionado):

```bash
composer install
```

### Rodando todos os testes

Via script definido no `composer.json`:

```bash
composer phpunit tests/Unit ou tests/Feature
```

Ou diretamente:

```bash
./vendor/bin/phpunit tests/Unit ou tests/Feature
```

### Estrutura de testes

Testes organizados em:

-  `tests/Unit` (testes de unidades / classes isoladas)
-  `tests/Feature` (quando houver interações de múltiplos componentes)

Arquivo de configuração: `phpunit.xml`

### Exemplo de teste existente

`tests/Unit/Core/Orders/CustomerTest.php` cobre comportamento básico da entidade `Customer` (atributo, mudança de estado).

### Logs e cobertura (opcional)

Há blocos comentados no `phpunit.xml` para gerar logs (`tests/logs/`). Para habilitar:

1. Descomente as seções `<logging>` e `<coverage>`.
2. Crie a pasta ignorada (se quiser local apenas):

```bash
mkdir -p tests/logs
```

### Dicas rápidas

-  Use nomes descritivos em métodos de teste: `testQueDeveFazerAlgoClaro`.
-  Evite dependência entre testes; cada teste deve ser independente.
-  Mockery: ideal para simular dependências externas sem acoplar implementação real.

---
