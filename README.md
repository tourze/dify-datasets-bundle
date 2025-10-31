# Dify Datasets Bundle

[English](README.md) | [中文](README.zh-CN.md)

这是一个 Symfony Bundle，用于管理 Dify 知识库数据集。

## 功能特性

- 数据集管理（创建、更新、删除、查询）
- 文档管理（创建、更新、删除、查询）
- 文档块管理（创建、更新、删除、查询）
- 知识库标签管理
- 嵌入模型管理

## 安装

```bash
composer require tourze/dify-datasets-bundle
```

## 使用

该 Bundle 提供了完整的 API 请求类，用于与 Dify 知识库 API 进行交互。

## 测试

```bash
./vendor/bin/phpunit packages/dify-datasets-bundle/tests
```