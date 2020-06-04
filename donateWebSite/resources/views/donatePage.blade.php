<!DOCTYPE html>
<html lang="zh_TW">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <title>XXX132 v118 </title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,300" rel="stylesheet" type="text/css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="css/app.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="content container">
        <!-- .page-header -->
        <div class="page-header">
            <div class="page-header-title"><h2>DONATE</h2></div>
            <div class="page-header-tail"></div>
        </div>
        <!-- / .page-header -->
        <div class="square body">
            <div class="row">
                    <div id="panel-donate" class="panel panel-primary">
        <div class="panel-heading">
            XXX132贊助
        </div>
        <div class="panel-body">
            <div class="container-fluid">
                                <form class="form-horizontal text-left center-block" action="/api/pay" method="post">
                                    @csrf
                    <input type="hidden" name="_token" value="dgSm4W9TdDMgZm8aebyjcxS8BwckHIIaMSeCA8ey">
                    <div style="display:none;" class="form-group ">
                        <label for="depositType" class="col-sm-1 control-label">贊助類型</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="depositType">
                                <option value="0">伺服器贊助</option>
                            </select>
                                                    </div>
                    </div>
                    <div class="form-group ">
                        <label for="account" class="col-sm-3 control-label">
                            <span class="text-left" style="color:red">*</span>
                            XXX132遊戲帳號
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="account" name="account" placeholder="遊戲帳號" value="">
                                                    </div>
                    </div>

                    <div class="form-group ">
                        <label for="amount" class="col-sm-3 control-label">
                            <span class="text-left" style="color:red">*</span>
                            XXX132贊助金額
                        </label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <div class="input-group-addon">$</div>
                                <input type="number" class="form-control" id="amount" name="amount" min="300" max="20000" value="300">
                                <div class="input-group-addon">TWD</div>
                            </div>
                                                        <br>
                            <div class="alert alert-warning" role="alert">
                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                <span class="sr-only">注意:</span>
                                <span>因系統問題，只提供300元以上的贊助方式</span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="feedback" class="col-sm-3 control-label">
                            XXX132回饋點數
                        </label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="number" readonly class="form-control ignore" id="feedback" name="feedback"  value="">
                                <div class="input-group-addon">點</div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group ">
                        <label for="payType" class="col-sm-3 control-label">
                            <span class="text-left" style="color:red">*</span>
                            付款方式
                        </label>
                        <div class="col-sm-9">
                            <div class="radio">
                                <label>
                                    <input type="radio" name="payType"  value="0" checked>
                                    超商代碼(全家/萊爾富/OK超商/7-11 ibon代碼)
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="payType"  value="1">
                                    ATM虛擬帳號轉帳
                                </label>
                            </div>

                        </div>
                    </div>
                    <hr>
                    <div class="form-group ">
                        <label for="recaptcha" class="col-sm-3 control-label">
                            驗證碼
                        </label>
                        <div class="col-sm-9">
                        <table width="200" border="0">
  <tr>
    <td><input type="text" style=" width:100px;" name="checkcode" class="form-control" id="cap" placeholder="請輸入驗證碼"></td>

      <td>  <img src="CheckCode"  /></td>


      <!--<td>  <img src="/checkcode.php" width="60" height="30" alt="" /></td>-->
      <!--<img class="thumbnail captcha" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="點選圖片重新獲取驗證碼">-->

  </tr>
</table>



                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12">
                            <button type="submit" id="submit" class="btn btn-primary btn-block"> 開單</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
            </div>
        </div>
    </div>
    <div class="container">
        <footer class="footer">
            <div class="container">
                <a href="" onclick="setlang('tw')" style="font-weight: bolder;">中文 (台灣)</a>
                <a href="" onclick="setlang('en')" style="">English (US)</a>
                <p>Copyright JiuMiGu 2015-2016 ©</p>
            </div>
        </footer>
    </div>
<!-- Scripts -->
<script src="http://code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="js/lang.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js"></script>
    <script src="js/donate.validate.js"></script>
    <script type="text/javascript">
        function refreshAmount() {
            var amount = parseInt($('#amount').val());
            if(isNaN(amount)) {
            } else {
                amount *= 5;
                $('#feedback').val(amount);
            }
        }
        $('#amount').on('input', function() {
            refreshAmount();
        });
        refreshAmount();
    </script>
</body>
</html>
