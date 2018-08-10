<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Hello, {{ $rsvp->name }}</title>
</head>
<style>
  /* Variables */
  :root {
    --main-bg-color: #fcfbe8;
    --main-text-color: black;
  }

  /* Base */
  body, body *:not(html):not(style):not(br):not(tr):not(code) {
    font-family: serif;
    box-sizing: border-box;
  }

  body {
    background-color: var(--main-bg-color);
    color: var(--main-text-color);
    hyphens: auto;
    line-height: 1.4;
    margin: 0;
    -moz-hyphens: auto;
    width: 100% !important;
    -webkit-hyphens: auto;
    -webkit-text-size-adjust: none;
    padding-top: 20vh;
    padding-bottom: 20vh;
  }

  p,
  ul,
  ol,
  blockquote {
    line-height: 1.4;
  }

  a {
    color: #3869D4;
  }

  a img {
    border: none;
  }

  /* Typography */
  h1, h2, h3, p {
    font-family: serif;
  }

  h1 {
    /*font-size: 36pt;*/
    font-weight: bold;
    margin-top: 0;
  }

  h2 {
    /*font-size: 16px;*/
    font-weight: bold;
    margin-top: 0;
  }

  h3 {
    /*font-size: 14px;*/
    font-weight: bold;
    margin-top: 0;
  }

  p {
    /*font-size: 14px;*/
    line-height: 1.5em;
    margin-top: 0;
  }

  p.sub {
    font-size: 12px;
  }

  img {
    max-width: 100%;
    height: auto;
    display: block;
  }

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

  .btn {
    display: inline-block;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  }

  @media screen and (prefers-reduced-motion: reduce) {
    .btn {
      transition: none;
    }
  }

  .btn:hover, .btn:focus {
    text-decoration: none;
  }

  .btn:focus, .btn.focus {
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
  }

  .btn.disabled, .btn:disabled {
    opacity: 0.65;
  }

  .btn:not(:disabled):not(.disabled) {
    cursor: pointer;
  }

  a.btn.disabled,
  fieldset:disabled a.btn {
    pointer-events: none;
  }

  .btn-primary {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
  }

  .btn-primary:hover {
    color: #fff;
    background-color: #0069d9;
    border-color: #0062cc;
  }

  .btn-primary:focus, .btn-primary.focus {
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
  }

  .btn-primary.disabled, .btn-primary:disabled {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
  }

  .btn-primary:not(:disabled):not(.disabled):active, .btn-primary:not(:disabled):not(.disabled).active,
  .show > .btn-primary.dropdown-toggle {
    color: #fff;
    background-color: #0062cc;
    border-color: #005cbf;
  }

  .btn-primary:not(:disabled):not(.disabled):active:focus, .btn-primary:not(:disabled):not(.disabled).active:focus,
  .show > .btn-primary.dropdown-toggle:focus {
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
  }

  .btn-secondary {
    color: #fff;
    background-color: #6c757d;
    border-color: #6c757d;
  }

  .btn-secondary:hover {
    color: #fff;
    background-color: #5a6268;
    border-color: #545b62;
  }

  .btn-secondary:focus, .btn-secondary.focus {
    box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.5);
  }

  .btn-secondary.disabled, .btn-secondary:disabled {
    color: #fff;
    background-color: #6c757d;
    border-color: #6c757d;
  }

  .btn-secondary:not(:disabled):not(.disabled):active, .btn-secondary:not(:disabled):not(.disabled).active,
  .show > .btn-secondary.dropdown-toggle {
    color: #fff;
    background-color: #545b62;
    border-color: #4e555b;
  }

  .btn-secondary:not(:disabled):not(.disabled):active:focus, .btn-secondary:not(:disabled):not(.disabled).active:focus,
  .show > .btn-secondary.dropdown-toggle:focus {
    box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.5);
  }

  .btn-success {
    color: #fff;
    background-color: #28a745;
    border-color: #28a745;
  }

  .btn-success:hover {
    color: #fff;
    background-color: #218838;
    border-color: #1e7e34;
  }

  .btn-success:focus, .btn-success.focus {
    box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);
  }

  .btn-success.disabled, .btn-success:disabled {
    color: #fff;
    background-color: #28a745;
    border-color: #28a745;
  }

  .btn-success:not(:disabled):not(.disabled):active, .btn-success:not(:disabled):not(.disabled).active,
  .show > .btn-success.dropdown-toggle {
    color: #fff;
    background-color: #1e7e34;
    border-color: #1c7430;
  }

  .btn-success:not(:disabled):not(.disabled):active:focus, .btn-success:not(:disabled):not(.disabled).active:focus,
  .show > .btn-success.dropdown-toggle:focus {
    box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);
  }

  .btn-info {
    color: #fff;
    background-color: #17a2b8;
    border-color: #17a2b8;
  }

  .btn-info:hover {
    color: #fff;
    background-color: #138496;
    border-color: #117a8b;
  }

  .btn-info:focus, .btn-info.focus {
    box-shadow: 0 0 0 0.2rem rgba(23, 162, 184, 0.5);
  }

  .btn-info.disabled, .btn-info:disabled {
    color: #fff;
    background-color: #17a2b8;
    border-color: #17a2b8;
  }

  .btn-info:not(:disabled):not(.disabled):active, .btn-info:not(:disabled):not(.disabled).active,
  .show > .btn-info.dropdown-toggle {
    color: #fff;
    background-color: #117a8b;
    border-color: #10707f;
  }

  .btn-info:not(:disabled):not(.disabled):active:focus, .btn-info:not(:disabled):not(.disabled).active:focus,
  .show > .btn-info.dropdown-toggle:focus {
    box-shadow: 0 0 0 0.2rem rgba(23, 162, 184, 0.5);
  }

  .btn-warning {
    color: #212529;
    background-color: #ffc107;
    border-color: #ffc107;
  }

  .btn-warning:hover {
    color: #212529;
    background-color: #e0a800;
    border-color: #d39e00;
  }

  .btn-warning:focus, .btn-warning.focus {
    box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.5);
  }

  .btn-warning.disabled, .btn-warning:disabled {
    color: #212529;
    background-color: #ffc107;
    border-color: #ffc107;
  }

  .btn-warning:not(:disabled):not(.disabled):active, .btn-warning:not(:disabled):not(.disabled).active,
  .show > .btn-warning.dropdown-toggle {
    color: #212529;
    background-color: #d39e00;
    border-color: #c69500;
  }

  .btn-warning:not(:disabled):not(.disabled):active:focus, .btn-warning:not(:disabled):not(.disabled).active:focus,
  .show > .btn-warning.dropdown-toggle:focus {
    box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.5);
  }

  .btn-danger {
    color: #fff;
    background-color: #dc3545;
    border-color: #dc3545;
  }

  .btn-danger:hover {
    color: #fff;
    background-color: #c82333;
    border-color: #bd2130;
  }

  .btn-danger:focus, .btn-danger.focus {
    box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.5);
  }

  .btn-danger.disabled, .btn-danger:disabled {
    color: #fff;
    background-color: #dc3545;
    border-color: #dc3545;
  }

  .btn-danger:not(:disabled):not(.disabled):active, .btn-danger:not(:disabled):not(.disabled).active,
  .show > .btn-danger.dropdown-toggle {
    color: #fff;
    background-color: #bd2130;
    border-color: #b21f2d;
  }

  .btn-danger:not(:disabled):not(.disabled):active:focus, .btn-danger:not(:disabled):not(.disabled).active:focus,
  .show > .btn-danger.dropdown-toggle:focus {
    box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.5);
  }

  .btn-light {
    color: #212529;
    background-color: #f8f9fa;
    border-color: #f8f9fa;
  }

  .btn-light:hover {
    color: #212529;
    background-color: #e2e6ea;
    border-color: #dae0e5;
  }

  .btn-light:focus, .btn-light.focus {
    box-shadow: 0 0 0 0.2rem rgba(248, 249, 250, 0.5);
  }

  .btn-light.disabled, .btn-light:disabled {
    color: #212529;
    background-color: #f8f9fa;
    border-color: #f8f9fa;
  }

  .btn-light:not(:disabled):not(.disabled):active, .btn-light:not(:disabled):not(.disabled).active,
  .show > .btn-light.dropdown-toggle {
    color: #212529;
    background-color: #dae0e5;
    border-color: #d3d9df;
  }

  .btn-light:not(:disabled):not(.disabled):active:focus, .btn-light:not(:disabled):not(.disabled).active:focus,
  .show > .btn-light.dropdown-toggle:focus {
    box-shadow: 0 0 0 0.2rem rgba(248, 249, 250, 0.5);
  }

  .btn-dark {
    color: #fff;
    background-color: #343a40;
    border-color: #343a40;
  }

  .btn-dark:hover {
    color: #fff;
    background-color: #23272b;
    border-color: #1d2124;
  }

  .btn-dark:focus, .btn-dark.focus {
    box-shadow: 0 0 0 0.2rem rgba(52, 58, 64, 0.5);
  }

  .btn-dark.disabled, .btn-dark:disabled {
    color: #fff;
    background-color: #343a40;
    border-color: #343a40;
  }

  .btn-dark:not(:disabled):not(.disabled):active, .btn-dark:not(:disabled):not(.disabled).active,
  .show > .btn-dark.dropdown-toggle {
    color: #fff;
    background-color: #1d2124;
    border-color: #171a1d;
  }

  .btn-dark:not(:disabled):not(.disabled):active:focus, .btn-dark:not(:disabled):not(.disabled).active:focus,
  .show > .btn-dark.dropdown-toggle:focus {
    box-shadow: 0 0 0 0.2rem rgba(52, 58, 64, 0.5);
  }


  .btn-link {
    font-weight: 400;
    color: #007bff;
    background-color: transparent;
  }

  .btn-link:hover {
    color: #0056b3;
    text-decoration: underline;
    background-color: transparent;
    border-color: transparent;
  }

  .btn-link:focus, .btn-link.focus {
    text-decoration: underline;
    border-color: transparent;
    box-shadow: none;
  }

  .btn-link:disabled, .btn-link.disabled {
    color: #6c757d;
    pointer-events: none;
  }

  .btn-lg, .btn-group-lg > .btn {
    padding: 0.5rem 1rem;
    font-size: 1.25rem;
    line-height: 1.5;
    border-radius: 0.3rem;
  }

  .btn-sm, .btn-group-sm > .btn {
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
    line-height: 1.5;
    border-radius: 0.2rem;
  }

  .btn-block {
    display: block;
    width: 100%;
  }

  .btn-block + .btn-block {
    margin-top: 0.5rem;
  }

  p.message {
    font-weight: bold;
    text-transform: uppercase;
    padding: 15px;
  }

  .text-center {
    text-align: center;
  }

  .vip, .event, .confirm {
    margin-bottom: 40px;
  }

  .vip small, .vip b {
    margin-top: 10px;
    margin-bottom: 10px;
    display: block;
  }

  .vip h1 {
    padding: 15px;
  }

  .btn-confirm {
    background-color: #fbc1e9 !important;
    color: #000;
  }

  .btn-confirm, .btn-confirm:hover, .btn-confirm:focus {
    border-color: #fbc1e9;
    color: #000;
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
  <div class="row justify-content-center text-center">
    <p class="message">We would like to invite you to our birthday celebration</p>
  </div>

  <div class="row flex-column justify-content-center text-center vip">
    <h1>{{ $vip->birthday_person->name }}</h1>
    <small>Son of</small>
    <b>{{ $vip->birthday_person->father }}</b>
    <b>{{ $vip->birthday_person->mother }}</b>
  </div>

  <div class="row justify-content-center text-center">
    <div class="col-6">
      <h3>Birthday Party</h3>
      <p>{{ $event->present()->prettyDatetime() }}</p>
      <p>{!! strip_tags($event->location, "<p>") !!}</p>
    </div>
  </div>

  <div class="row flex-column justify-content-center text-center">
    <p class="message">We are looking forward to celebrating with you</p>
    <p>Please confirm the reservation below</p>
  </div>

  <div class="row justify-content-center confirm">
    <a href="{{ $url }}" target="_blank">
      <button class="btn btn-primary btn-lg btn-confirm">Confirm RSVP</button>
    </a>
  </div>

  <div class="row justify-content-center text-center">
    <p>Visit our <a href="{{ env('APP_URL') }}" target="_blank">site</a></p>
  </div>

</div>
</body>
</html>
