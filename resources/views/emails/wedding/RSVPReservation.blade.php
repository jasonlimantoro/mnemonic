<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>RSVP Reservation</title>
</head>
<style>
  /*!
 * Bootstrap Grid v4.1.3 (https://getbootstrap.com/)
 * Copyright 2011-2018 The Bootstrap Authors
 * Copyright 2011-2018 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 */
  @-ms-viewport {
    width: device-width;
  }

  html {
    box-sizing: border-box;
    -ms-overflow-style: scrollbar;
  }

  *,
  *::before,
  *::after {
    box-sizing: inherit;
  }

  .container {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
  }

  @media (min-width: 576px) {
    .container {
      max-width: 540px;
    }
  }

  @media (min-width: 768px) {
    .container {
      max-width: 720px;
    }
  }

  @media (min-width: 992px) {
    .container {
      max-width: 960px;
    }
  }

  @media (min-width: 1200px) {
    .container {
      max-width: 1140px;
    }
  }

  .container-fluid {
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
  }

  .row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
  }

  .no-gutters {
    margin-right: 0;
    margin-left: 0;
  }

  .no-gutters > .col,
  .no-gutters > [class*="col-"] {
    padding-right: 0;
    padding-left: 0;
  }

  .col-1, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-10, .col-11, .col-12, .col,
  .col-auto, .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm,
  .col-sm-auto, .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .col-md,
  .col-md-auto, .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg,
  .col-lg-auto, .col-xl-1, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl,
  .col-xl-auto {
    position: relative;
    width: 100%;
    min-height: 1px;
    padding-right: 15px;
    padding-left: 15px;
  }

  .col {
    -ms-flex-preferred-size: 0;
    flex-basis: 0;
    -ms-flex-positive: 1;
    flex-grow: 1;
    max-width: 100%;
  }

  .col-auto {
    -ms-flex: 0 0 auto;
    flex: 0 0 auto;
    width: auto;
    max-width: none;
  }

  .col-1 {
    -ms-flex: 0 0 8.333333%;
    flex: 0 0 8.333333%;
    max-width: 8.333333%;
  }

  .col-2 {
    -ms-flex: 0 0 16.666667%;
    flex: 0 0 16.666667%;
    max-width: 16.666667%;
  }

  .col-3 {
    -ms-flex: 0 0 25%;
    flex: 0 0 25%;
    max-width: 25%;
  }

  .col-4 {
    -ms-flex: 0 0 33.333333%;
    flex: 0 0 33.333333%;
    max-width: 33.333333%;
  }

  .col-5 {
    -ms-flex: 0 0 41.666667%;
    flex: 0 0 41.666667%;
    max-width: 41.666667%;
  }

  .col-6 {
    -ms-flex: 0 0 50%;
    flex: 0 0 50%;
    max-width: 50%;
  }

  .col-7 {
    -ms-flex: 0 0 58.333333%;
    flex: 0 0 58.333333%;
    max-width: 58.333333%;
  }

  .col-8 {
    -ms-flex: 0 0 66.666667%;
    flex: 0 0 66.666667%;
    max-width: 66.666667%;
  }

  .col-9 {
    -ms-flex: 0 0 75%;
    flex: 0 0 75%;
    max-width: 75%;
  }

  .col-10 {
    -ms-flex: 0 0 83.333333%;
    flex: 0 0 83.333333%;
    max-width: 83.333333%;
  }

  .col-11 {
    -ms-flex: 0 0 91.666667%;
    flex: 0 0 91.666667%;
    max-width: 91.666667%;
  }

  .col-12 {
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
    max-width: 100%;
  }

  @media (min-width: 576px) {
    .col-sm {
      -ms-flex-preferred-size: 0;
      flex-basis: 0;
      -ms-flex-positive: 1;
      flex-grow: 1;
      max-width: 100%;
    }

    .col-sm-auto {
      -ms-flex: 0 0 auto;
      flex: 0 0 auto;
      width: auto;
      max-width: none;
    }

    .col-sm-1 {
      -ms-flex: 0 0 8.333333%;
      flex: 0 0 8.333333%;
      max-width: 8.333333%;
    }

    .col-sm-2 {
      -ms-flex: 0 0 16.666667%;
      flex: 0 0 16.666667%;
      max-width: 16.666667%;
    }

    .col-sm-3 {
      -ms-flex: 0 0 25%;
      flex: 0 0 25%;
      max-width: 25%;
    }

    .col-sm-4 {
      -ms-flex: 0 0 33.333333%;
      flex: 0 0 33.333333%;
      max-width: 33.333333%;
    }

    .col-sm-5 {
      -ms-flex: 0 0 41.666667%;
      flex: 0 0 41.666667%;
      max-width: 41.666667%;
    }

    .col-sm-6 {
      -ms-flex: 0 0 50%;
      flex: 0 0 50%;
      max-width: 50%;
    }

    .col-sm-7 {
      -ms-flex: 0 0 58.333333%;
      flex: 0 0 58.333333%;
      max-width: 58.333333%;
    }

    .col-sm-8 {
      -ms-flex: 0 0 66.666667%;
      flex: 0 0 66.666667%;
      max-width: 66.666667%;
    }

    .col-sm-9 {
      -ms-flex: 0 0 75%;
      flex: 0 0 75%;
      max-width: 75%;
    }

    .col-sm-10 {
      -ms-flex: 0 0 83.333333%;
      flex: 0 0 83.333333%;
      max-width: 83.333333%;
    }

    .col-sm-11 {
      -ms-flex: 0 0 91.666667%;
      flex: 0 0 91.666667%;
      max-width: 91.666667%;
    }

    .col-sm-12 {
      -ms-flex: 0 0 100%;
      flex: 0 0 100%;
      max-width: 100%;
    }
  }

  @media (min-width: 768px) {
    .col-md {
      -ms-flex-preferred-size: 0;
      flex-basis: 0;
      -ms-flex-positive: 1;
      flex-grow: 1;
      max-width: 100%;
    }

    .col-md-auto {
      -ms-flex: 0 0 auto;
      flex: 0 0 auto;
      width: auto;
      max-width: none;
    }

    .col-md-1 {
      -ms-flex: 0 0 8.333333%;
      flex: 0 0 8.333333%;
      max-width: 8.333333%;
    }

    .col-md-2 {
      -ms-flex: 0 0 16.666667%;
      flex: 0 0 16.666667%;
      max-width: 16.666667%;
    }

    .col-md-3 {
      -ms-flex: 0 0 25%;
      flex: 0 0 25%;
      max-width: 25%;
    }

    .col-md-4 {
      -ms-flex: 0 0 33.333333%;
      flex: 0 0 33.333333%;
      max-width: 33.333333%;
    }

    .col-md-5 {
      -ms-flex: 0 0 41.666667%;
      flex: 0 0 41.666667%;
      max-width: 41.666667%;
    }

    .col-md-6 {
      -ms-flex: 0 0 50%;
      flex: 0 0 50%;
      max-width: 50%;
    }

    .col-md-7 {
      -ms-flex: 0 0 58.333333%;
      flex: 0 0 58.333333%;
      max-width: 58.333333%;
    }

    .col-md-8 {
      -ms-flex: 0 0 66.666667%;
      flex: 0 0 66.666667%;
      max-width: 66.666667%;
    }

    .col-md-9 {
      -ms-flex: 0 0 75%;
      flex: 0 0 75%;
      max-width: 75%;
    }

    .col-md-10 {
      -ms-flex: 0 0 83.333333%;
      flex: 0 0 83.333333%;
      max-width: 83.333333%;
    }

    .col-md-11 {
      -ms-flex: 0 0 91.666667%;
      flex: 0 0 91.666667%;
      max-width: 91.666667%;
    }

    .col-md-12 {
      -ms-flex: 0 0 100%;
      flex: 0 0 100%;
      max-width: 100%;
    }

  }

  @media (min-width: 992px) {
    .col-lg {
      -ms-flex-preferred-size: 0;
      flex-basis: 0;
      -ms-flex-positive: 1;
      flex-grow: 1;
      max-width: 100%;
    }

    .col-lg-auto {
      -ms-flex: 0 0 auto;
      flex: 0 0 auto;
      width: auto;
      max-width: none;
    }

    .col-lg-1 {
      -ms-flex: 0 0 8.333333%;
      flex: 0 0 8.333333%;
      max-width: 8.333333%;
    }

    .col-lg-2 {
      -ms-flex: 0 0 16.666667%;
      flex: 0 0 16.666667%;
      max-width: 16.666667%;
    }

    .col-lg-3 {
      -ms-flex: 0 0 25%;
      flex: 0 0 25%;
      max-width: 25%;
    }

    .col-lg-4 {
      -ms-flex: 0 0 33.333333%;
      flex: 0 0 33.333333%;
      max-width: 33.333333%;
    }

    .col-lg-5 {
      -ms-flex: 0 0 41.666667%;
      flex: 0 0 41.666667%;
      max-width: 41.666667%;
    }

    .col-lg-6 {
      -ms-flex: 0 0 50%;
      flex: 0 0 50%;
      max-width: 50%;
    }

    .col-lg-7 {
      -ms-flex: 0 0 58.333333%;
      flex: 0 0 58.333333%;
      max-width: 58.333333%;
    }

    .col-lg-8 {
      -ms-flex: 0 0 66.666667%;
      flex: 0 0 66.666667%;
      max-width: 66.666667%;
    }

    .col-lg-9 {
      -ms-flex: 0 0 75%;
      flex: 0 0 75%;
      max-width: 75%;
    }

    .col-lg-10 {
      -ms-flex: 0 0 83.333333%;
      flex: 0 0 83.333333%;
      max-width: 83.333333%;
    }

    .col-lg-11 {
      -ms-flex: 0 0 91.666667%;
      flex: 0 0 91.666667%;
      max-width: 91.666667%;
    }

    .col-lg-12 {
      -ms-flex: 0 0 100%;
      flex: 0 0 100%;
      max-width: 100%;
    }

  }

  @media (min-width: 1200px) {
    .col-xl {
      -ms-flex-preferred-size: 0;
      flex-basis: 0;
      -ms-flex-positive: 1;
      flex-grow: 1;
      max-width: 100%;
    }

    .col-xl-auto {
      -ms-flex: 0 0 auto;
      flex: 0 0 auto;
      width: auto;
      max-width: none;
    }

    .col-xl-1 {
      -ms-flex: 0 0 8.333333%;
      flex: 0 0 8.333333%;
      max-width: 8.333333%;
    }

    .col-xl-2 {
      -ms-flex: 0 0 16.666667%;
      flex: 0 0 16.666667%;
      max-width: 16.666667%;
    }

    .col-xl-3 {
      -ms-flex: 0 0 25%;
      flex: 0 0 25%;
      max-width: 25%;
    }

    .col-xl-4 {
      -ms-flex: 0 0 33.333333%;
      flex: 0 0 33.333333%;
      max-width: 33.333333%;
    }

    .col-xl-5 {
      -ms-flex: 0 0 41.666667%;
      flex: 0 0 41.666667%;
      max-width: 41.666667%;
    }

    .col-xl-6 {
      -ms-flex: 0 0 50%;
      flex: 0 0 50%;
      max-width: 50%;
    }

    .col-xl-7 {
      -ms-flex: 0 0 58.333333%;
      flex: 0 0 58.333333%;
      max-width: 58.333333%;
    }

    .col-xl-8 {
      -ms-flex: 0 0 66.666667%;
      flex: 0 0 66.666667%;
      max-width: 66.666667%;
    }

    .col-xl-9 {
      -ms-flex: 0 0 75%;
      flex: 0 0 75%;
      max-width: 75%;
    }

    .col-xl-10 {
      -ms-flex: 0 0 83.333333%;
      flex: 0 0 83.333333%;
      max-width: 83.333333%;
    }

    .col-xl-11 {
      -ms-flex: 0 0 91.666667%;
      flex: 0 0 91.666667%;
      max-width: 91.666667%;
    }

    .col-xl-12 {
      -ms-flex: 0 0 100%;
      flex: 0 0 100%;
      max-width: 100%;
    }

  }


  .flex-row {
    -ms-flex-direction: row !important;
    flex-direction: row !important;
  }

  .flex-column {
    -ms-flex-direction: column !important;
    flex-direction: column !important;
  }

  .flex-row-reverse {
    -ms-flex-direction: row-reverse !important;
    flex-direction: row-reverse !important;
  }

  .flex-column-reverse {
    -ms-flex-direction: column-reverse !important;
    flex-direction: column-reverse !important;
  }

  .flex-wrap {
    -ms-flex-wrap: wrap !important;
    flex-wrap: wrap !important;
  }

  .flex-nowrap {
    -ms-flex-wrap: nowrap !important;
    flex-wrap: nowrap !important;
  }

  .flex-wrap-reverse {
    -ms-flex-wrap: wrap-reverse !important;
    flex-wrap: wrap-reverse !important;
  }

  .flex-fill {
    -ms-flex: 1 1 auto !important;
    flex: 1 1 auto !important;
  }

  .flex-grow-0 {
    -ms-flex-positive: 0 !important;
    flex-grow: 0 !important;
  }

  .flex-grow-1 {
    -ms-flex-positive: 1 !important;
    flex-grow: 1 !important;
  }

  .flex-shrink-0 {
    -ms-flex-negative: 0 !important;
    flex-shrink: 0 !important;
  }

  .flex-shrink-1 {
    -ms-flex-negative: 1 !important;
    flex-shrink: 1 !important;
  }

  .justify-content-start {
    -ms-flex-pack: start !important;
    justify-content: flex-start !important;
  }

  .justify-content-end {
    -ms-flex-pack: end !important;
    justify-content: flex-end !important;
  }

  .justify-content-center {
    -ms-flex-pack: center !important;
    justify-content: center !important;
  }

  .justify-content-between {
    -ms-flex-pack: justify !important;
    justify-content: space-between !important;
  }

  .justify-content-around {
    -ms-flex-pack: distribute !important;
    justify-content: space-around !important;
  }

  .align-items-start {
    -ms-flex-align: start !important;
    align-items: flex-start !important;
  }

  .align-items-end {
    -ms-flex-align: end !important;
    align-items: flex-end !important;
  }

  .align-items-center {
    -ms-flex-align: center !important;
    align-items: center !important;
  }

  .align-items-baseline {
    -ms-flex-align: baseline !important;
    align-items: baseline !important;
  }

  .align-items-stretch {
    -ms-flex-align: stretch !important;
    align-items: stretch !important;
  }

  .align-content-start {
    -ms-flex-line-pack: start !important;
    align-content: flex-start !important;
  }

  .align-content-end {
    -ms-flex-line-pack: end !important;
    align-content: flex-end !important;
  }

  .align-content-center {
    -ms-flex-line-pack: center !important;
    align-content: center !important;
  }

  .align-content-between {
    -ms-flex-line-pack: justify !important;
    align-content: space-between !important;
  }

  .align-content-around {
    -ms-flex-line-pack: distribute !important;
    align-content: space-around !important;
  }

  .align-content-stretch {
    -ms-flex-line-pack: stretch !important;
    align-content: stretch !important;
  }

  .align-self-auto {
    -ms-flex-item-align: auto !important;
    align-self: auto !important;
  }

  .align-self-start {
    -ms-flex-item-align: start !important;
    align-self: flex-start !important;
  }

  .align-self-end {
    -ms-flex-item-align: end !important;
    align-self: flex-end !important;
  }

  .align-self-center {
    -ms-flex-item-align: center !important;
    align-self: center !important;
  }

  .align-self-baseline {
    -ms-flex-item-align: baseline !important;
    align-self: baseline !important;
  }

  .align-self-stretch {
    -ms-flex-item-align: stretch !important;
    align-self: stretch !important;
  }
  /* Table Component */
  table {
    border-collapse: collapse;
  }
  .table {
    width: 100%;
    margin-bottom: 1rem;
    background-color: transparent;
  }

  .table th,
  .table td {
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
  }

  .table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #dee2e6;
  }

  .table tbody + tbody {
    border-top: 2px solid #dee2e6;
  }

  .table .table {
    background-color: #fff;
  }

  .table-sm th,
  .table-sm td {
    padding: 0.3rem;
  }

  .table-bordered {
    border: 1px solid #dee2e6;
  }

  .table-bordered th,
  .table-bordered td {
    border: 1px solid #dee2e6;
  }

  .table-bordered thead th,
  .table-bordered thead td {
    border-bottom-width: 2px;
  }

  .table-borderless th,
  .table-borderless td,
  .table-borderless thead th,
  .table-borderless tbody + tbody {
    border: 0;
  }

  .table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(0, 0, 0, 0.05);
  }

  .table-hover tbody tr:hover {
    background-color: rgba(0, 0, 0, 0.075);
  }

  .table-primary,
  .table-primary > th,
  .table-primary > td {
    background-color: #b8daff;
  }

  .table-hover .table-primary:hover {
    background-color: #9fcdff;
  }

  .table-hover .table-primary:hover > td,
  .table-hover .table-primary:hover > th {
    background-color: #9fcdff;
  }

  .table-secondary,
  .table-secondary > th,
  .table-secondary > td {
    background-color: #d6d8db;
  }

  .table-hover .table-secondary:hover {
    background-color: #c8cbcf;
  }

  .table-hover .table-secondary:hover > td,
  .table-hover .table-secondary:hover > th {
    background-color: #c8cbcf;
  }

  .table-success,
  .table-success > th,
  .table-success > td {
    background-color: #c3e6cb;
  }

  .table-hover .table-success:hover {
    background-color: #b1dfbb;
  }

  .table-hover .table-success:hover > td,
  .table-hover .table-success:hover > th {
    background-color: #b1dfbb;
  }

  .table-info,
  .table-info > th,
  .table-info > td {
    background-color: #bee5eb;
  }

  .table-hover .table-info:hover {
    background-color: #abdde5;
  }

  .table-hover .table-info:hover > td,
  .table-hover .table-info:hover > th {
    background-color: #abdde5;
  }

  .table-warning,
  .table-warning > th,
  .table-warning > td {
    background-color: #ffeeba;
  }

  .table-hover .table-warning:hover {
    background-color: #ffe8a1;
  }

  .table-hover .table-warning:hover > td,
  .table-hover .table-warning:hover > th {
    background-color: #ffe8a1;
  }

  .table-danger,
  .table-danger > th,
  .table-danger > td {
    background-color: #f5c6cb;
  }

  .table-hover .table-danger:hover {
    background-color: #f1b0b7;
  }

  .table-hover .table-danger:hover > td,
  .table-hover .table-danger:hover > th {
    background-color: #f1b0b7;
  }

  .table-light,
  .table-light > th,
  .table-light > td {
    background-color: #fdfdfe;
  }

  .table-hover .table-light:hover {
    background-color: #ececf6;
  }

  .table-hover .table-light:hover > td,
  .table-hover .table-light:hover > th {
    background-color: #ececf6;
  }

  .table-dark,
  .table-dark > th,
  .table-dark > td {
    background-color: #c6c8ca;
  }

  .table-hover .table-dark:hover {
    background-color: #b9bbbe;
  }

  .table-hover .table-dark:hover > td,
  .table-hover .table-dark:hover > th {
    background-color: #b9bbbe;
  }

  .table-active,
  .table-active > th,
  .table-active > td {
    background-color: rgba(0, 0, 0, 0.075);
  }

  .table-hover .table-active:hover {
    background-color: rgba(0, 0, 0, 0.075);
  }

  .table-hover .table-active:hover > td,
  .table-hover .table-active:hover > th {
    background-color: rgba(0, 0, 0, 0.075);
  }

  .table .thead-dark th {
    color: #fff;
    background-color: #212529;
    border-color: #32383e;
  }

  .table .thead-light th {
    color: #495057;
    background-color: #e9ecef;
    border-color: #dee2e6;
  }

  .table-dark {
    color: #fff;
    background-color: #212529;
  }

  .table-dark th,
  .table-dark td,
  .table-dark thead th {
    border-color: #32383e;
  }

  .table-dark.table-bordered {
    border: 0;
  }

  .table-dark.table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(255, 255, 255, 0.05);
  }

  .table-dark.table-hover tbody tr:hover {
    background-color: rgba(255, 255, 255, 0.075);
  }

  @media (max-width: 575.98px) {
    .table-responsive-sm {
      display: block;
      width: 100%;
      overflow-x: auto;
      -webkit-overflow-scrolling: touch;
      -ms-overflow-style: -ms-autohiding-scrollbar;
    }
    .table-responsive-sm > .table-bordered {
      border: 0;
    }
  }

  @media (max-width: 767.98px) {
    .table-responsive-md {
      display: block;
      width: 100%;
      overflow-x: auto;
      -webkit-overflow-scrolling: touch;
      -ms-overflow-style: -ms-autohiding-scrollbar;
    }
    .table-responsive-md > .table-bordered {
      border: 0;
    }
  }

  @media (max-width: 991.98px) {
    .table-responsive-lg {
      display: block;
      width: 100%;
      overflow-x: auto;
      -webkit-overflow-scrolling: touch;
      -ms-overflow-style: -ms-autohiding-scrollbar;
    }
    .table-responsive-lg > .table-bordered {
      border: 0;
    }
  }

  @media (max-width: 1199.98px) {
    .table-responsive-xl {
      display: block;
      width: 100%;
      overflow-x: auto;
      -webkit-overflow-scrolling: touch;
      -ms-overflow-style: -ms-autohiding-scrollbar;
    }
    .table-responsive-xl > .table-bordered {
      border: 0;
    }
  }

  .table-responsive {
    display: block;
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    -ms-overflow-style: -ms-autohiding-scrollbar;
  }

  .table-responsive > .table-bordered {
    border: 0;
  }
    /* Variables */
  :root {
    --font-family-sans-serif: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    --main-bg-color: #fcfbe8;
  }
  html {
    font-family: var(--font-family-sans-serif);
  }

  html, body {
    min-height: 100vh;
    background-color: var(--main-bg-color, white);
  }

  .full-height {
    min-height: 100vh;
  }
  h1, p {
    text-align: center;
  }

  /* Responsive typography */
  html { font-size: 1rem; }
  @media (min-width: 576px) { html { font-size: 1.1rem; } }
  @media (min-width: 768px) { html { font-size: 1.2rem; } }
  @media (min-width: 992px) { html { font-size: 1.3rem; } }
  @media (min-width: 1200px) { html { font-size: 1.4rem; } }

</style>
<body>
<div class="container">
  <div class="row justify-content-center align-items-center full-height">
    <div class="col">
      <h1>The Wedding of {{ strtok($groom->name, " ") }} and {{ strtok($bride->name, " ") }}</h1>
      <div class="table-responsive">
        @component('layouts.table')
          @slot('tableBody')
            <tr>
              <td>RSVP Code</td>
              <td>#{{ str_pad($rsvp->id, 4, 0, STR_PAD_LEFT) }}</td>
            </tr>

            <tr>
              <td>Attendee</td>
              <td>{{ $rsvp->name }}</td>
            </tr>

            <tr>
              <td>Table Name</td>
              <td>{{ $rsvp->table_name }}</td>
            </tr>

            <tr>
              <td>Total Invitation</td>
              <td>{{ $rsvp->total_invitation }}</td>
            </tr>

            <tr>
              <td>Email</td>
              <td>{{ $rsvp->email }}</td>
            </tr>

            <tr>
              <td>Phone</td>
              <td>{{ $rsvp->phone }}</td>
            </tr>
          @endslot
        @endcomponent
        <p>Thank you for your reservation, please keep this information.</p>
      </div>
    </div>
  </div>
</div>
</body>
</html>