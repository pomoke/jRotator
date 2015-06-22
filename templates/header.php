<!DOCTYPE html>
<html>
  <head>
    <title>
      <?php echo $siteName; ?> Rotator
    </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Bitcoin, Free, Rotator, Coin, Crypto">
    <meta name="description" content="Bitcoin Faucet rotator">
    <link href='favicon.ico' rel='shortcut icon' type='image/x-icon' />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <style type='text/css'>
      html{
        position: relative;
        min-height: 100%;
      }
      
      body{
        background-color: #F0FFFF;
      }
      
      .container {
        text-align: center;
        padding-top: 5px;
        padding-bottom: 5px;
      }
    </style>
    <?php if(!empty($googleAnalyticsId)): ?>
    <!-- Google Analytics -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', '<?php echo $googleAnalyticsId; ?>', 'auto');
      ga('send', 'pageview');
    </script>
    <!-- Google Analytics -->
    <?php endif; ?>
  </head>

  <body>
    <div class="container container-fluid">
      <div class="row">
        <div class="col-xs-16 col-md-8" align="left">
        <?php if(!empty($faucetId)): ?>
          <?php echo $bannerAd; ?>
        <?php else: ?>
          <p style="font-family:Impact;font-size:40px"><?php echo $siteName; ?></p>
        <?php endif; ?>
        </div>
        <div align="center" class="col-xs-8 col-md-4">
          <div class="btn-group" role="group">
          <?php if($faucetId == 0): ?>
            <a type="button" class="btn btn-success btn-lg data-toggle="modal" data-target=".bs-browse" data-toggle="modal" data-target="#refer">Browse</a>
            <a type="button" class="btn btn-success btn-lg" href="/?id=1">Start &raquo;</a>
          <?php else: ?>
          <?php if($faucetId <= 1): ?>
            <a type="button" class="btn btn-info btn-lg disabled">&laquo; Prev</a>
          <?php else: ?>
            <a type="button" class="btn btn-info btn-lg" href="/?id=<?php echo ($faucetId - 1) ?>">&laquo; Prev</a>
          <?php endif; ?>
            <a type="button" class="btn btn-info btn-lg data-toggle="modal" data-target=".bs-browse" data-toggle="modal" data-target="#refer">Browse</a>
          <?php if($faucetId >= count($faucetList)): ?>
            <a type="button" class="btn btn-info btn-lg disabled">Next &raquo;</a>
          <?php else: ?>
            <a type="button" class="btn btn-info btn-lg" href="/?id=<?php echo ($faucetId + 1) ?>">Next &raquo;</a>
          <?php endif; ?>
          <?php endif; ?>
          </div>
          <div class="modal fade bs-browse" tabindex="-1" role="dialog" aria-labelledby="FaucetBrowser" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h2 align="center" class="modal-title" id="FaucetBrowser">Faucet List Browser</h2>
                </div>
                <div class="modal-body">
                  <a type="button" class="btn btn-info btn-lg" href="/">Home</a>
                  <br /><br />
                  <?php foreach($faucetList as $listId => $listName) {
                    if ($faucetId == ($listId + 1)) {
                      echo "<a type='button' class='btn btn-success btn-sm disabled'>". $listName[0] ."</a> ";
                    } else {
                      echo "<a type='button' class='btn btn-success btn-sm' href='/?id=". ($listId + 1) . "'>". $listName[0] ."</a> ";
                    }
                  }
                  ?>
                </div>
                <div class="modal-footer">
                  Donate to us: Please set your bitcoin address here
                </div>
              </div>
            </div>
          </div>
          <br />
          <?php if(!empty($faucetId)): ?>
          <b>Viewing:</b> <i><?php echo $faucetName.' ('.$faucetId.')' ?></i>
          <?php else: ?>
          &copy; <?php echo $siteName; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>