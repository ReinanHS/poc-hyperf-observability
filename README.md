<div align="center">
   <img src=".github/content/observability-hyperf.png" alt="logo" width="20%">
</div>

POC Hyperf Observability
=======================================

[![Licence: MIT](https://img.shields.io/badge/Licence-MIT-green)](LICENCE)
[![Team](https://img.shields.io/badge/Team-General-red)](https://gitlab.com/educa-code-labs/general)

* * *

Esse repositório tem o objetivo de demonstrar como funciona o processo de observabilidade dentro do ecossistema Hyperf. Nesse projeto é feito todas as configurações básicas para você conseguir iniciar e dar os primeiros passos na observabilidade dos seus serviços usando esse framework.

## O que é observabilidade?

Observabilidade é uma propriedade de sistemas complexos que se refere à capacidade de entender e inferir o estado interno e o comportamento de um sistema com base em informações observáveis externamente. É a capacidade de observar, medir e entender o funcionamento de um sistema, permitindo a detecção e resolução de problemas.

## Benefícios da observabilidade

A utilização da observabilidade nos seus serviços traz uma série de benefícios importantes. Veja os exemplos abaixo:

1. **Detecção e resolução rápida de problemas**: A observabilidade permite identificar problemas e anomalias em tempo real. Com métricas, logs e traces disponíveis, você pode monitorar o desempenho e o comportamento do sistema, detectando falhas, gargalos ou comportamentos inesperados.
2. **Melhoria da confiabilidade**: Ao ter uma visibilidade clara do estado interno do sistema, você pode tomar medidas proativas para melhorar a confiabilidade. Monitorar métricas como taxa de erros, tempo de resposta e disponibilidade ajuda a identificar áreas problemáticas e implementar ações corretivas antes que os problemas se tornem críticos. Isso resulta em um sistema mais robusto e confiável.
3. **Depuração e diagnóstico eficientes**: A observabilidade fornece informações valiosas para depurar problemas e investigar falhas. Com logs detalhados e traces de transações, você pode rastrear o fluxo de execução do sistema e entender o contexto em que ocorreu um problema. Isso simplifica o processo de identificação da causa-raiz e acelera o tempo de resolução.
4. **Melhoria do desempenho e otimização**: Ao analisar as métricas de desempenho, você pode identificar gargalos e pontos de melhoria no seu sistema. A observabilidade ajuda a identificar oportunidades de otimização, permitindo ajustar recursos, melhorar algoritmos ou reestruturar componentes para obter um desempenho mais eficiente e escalável.

Em resumo, a observabilidade oferece uma série de benefícios, incluindo detecção e resolução rápida de problemas, melhoria da confiabilidade, depuração eficiente, otimização de desempenho, tomada de decisões informadas e melhoria da experiência do usuário.

## Configuração do ambiente

A seguir, apresentam-se os requisitos e etapas fundamentais para a configuração do seu ambiente a fim de executar o projeto de exemplo.

### Requisitos

- Docker
- Git
- Make

### Instalação

A maneira recomendada de instalar este projeto é seguindo estas etapas:

1. Realize o clone do projeto para a sua máquina

```shell
git clone https://github.com/ReinanHS/poc-hyperf-observability.git
```

2. Acessar as pastas do projeto

```shell
cd poc-hyperf-observability 
docker compose up
```

3. Abra um novo terminal e execute os comandos abaixo:

```shell
docker exec -it hyperf-example-app bash
composer install
composer start
```

4. Abra um novo terminal e execute os comandos abaixo:

```shell
curl http://localhost:9501/ -v
curl http://localhost:9501/external-api -v
curl http://localhost:9501/redis -v
curl http://localhost:9501/database -v
curl http://localhost:9501/exception -v
```

### Visualizar informações

Veja as etapas necessárias para conseguir visualizar as informações geradas.

### Software stack

Esse projeto roda nos seguintes softwares:

- Git 2.33+
- Hyperf
- ZipKin
- Promotheus
- Grafana
- MySQL
- Redis

### Changelog

Por favor, veja [CHANGELOG](CHANGELOG.md) para obter mais informações sobre o que mudou recentemente.

### Seja um dos contribuidores

Quer fazer parte desse projeto? Clique AQUI e leia [como contribuir](CONTRIBUTING.md).

### Licença

Esse projeto está sob licença. Veja o arquivo [LICENÇA](LICENSE.md) para mais detalhes.
