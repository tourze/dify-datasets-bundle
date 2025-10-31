# Dify 数据集包

[English](README.md) | [中文](README.zh-CN.md)

用于 Dify AI 数据集和知识库管理的 Symfony Bundle，提供完整的知识库操作功能。

## 功能特性

- **知识库管理**：创建、更新、删除知识库
- **文档管理**：支持文件和文本创建文档
- **文档块操作**：管理文档分块和子块
- **标签系统**：知识库类型标签管理和绑定
- **检索功能**：从知识库检索相关内容块
- **嵌入模型**：获取可用的嵌入模型列表
- **状态监控**：文档嵌入状态和进度跟踪

## 安装

```bash
composer require tourze/dify-datasets-bundle
```

## 配置

将 bundle 添加到 `config/bundles.php`：

```php
return [
    // ... 其他 bundles
    Tourze\DifyDatasetsBundle\DifyDatasetsBundle::class => ['all' => true],
];
```

## API 端点

- **知识库 CRUD**：创建、读取、更新、删除知识库
- **文档管理**：文件/文本创建文档，更新文档状态
- **块操作**：获取、添加、更新、删除文档块
- **标签管理**：创建、绑定、解绑知识库标签
- **检索服务**：从知识库检索相关内容
- **模型查询**：获取嵌入模型列表

## 使用方法

```php
// 创建知识库
$dataset = $datasetService->createDataset($name, $description);

// 从文件创建文档
$document = $datasetService->createDocumentByFile($datasetId, $file);

// 检索内容块
$chunks = $datasetService->retrieveFromDataset($datasetId, $query);
```

## 系统要求

- PHP 8.1+
- Symfony 7.3+
- tourze/dify-core-bundle

## 许可证

此 bundle 基于 MIT 许可证发布。详细信息请查看 [LICENSE](LICENSE) 文件。