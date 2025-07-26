<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= isset($title) ? $title : 'Book' ?> - Master</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- AdminLTE -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css') ?>">

  <style>
  body {
    background: #f9f9f9;
    font-family: 'Poppins', sans-serif;
  }
    .nota {
      max-width: 480px;
      margin: 30px auto;
      background: #fff;
      padding: 20px;
      border: 1px dashed #333;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .nota h1 {
      font-size: 28px;
      margin: 0;
      text-align: center;
      text-transform: uppercase;
    }
    .nota .alamat {
      font-size: 13px;
      text-align: center;
      margin-bottom: 10px;
    }
    .nota hr {
      border-top: 1px dashed #666;
    }
    .nota .table td, .nota .table th {
      padding: 5px;
      font-size: 14px;
    }
    .nota .footer {
      text-align: center;
      font-size: 13px;
      margin-top: 15px;
    }
  </style>
</head>
<body>
