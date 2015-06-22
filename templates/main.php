<?php require 'header.php'; ?>

<?php if(!empty($faucetId)): ?>
<iframe style="position: fixed; width: 100%; height: 88%;" frameborder="0" src="<?php echo $faucetUrl ?>"></iframe>
<?php else: ?>
<div class="container container-fluid">
  <div class="row well">
    <div class="embed-responsive embed-responsive-16by9">
      <iframe class="embed-responsive-item" src="//www.youtube.com/embed/Gc2en3nHxA4?rel=0&showinfo=0&wmode=opaque" frameborder="0" allowfullscreen></iframe>
    </div>
    <h3>What is Bitcoin?</h3>
    <p>Bitcoin is the first decentralized digital currency. Bitcoins are digital coins you can send through the internet. Compare to other alternatives Bitcoins have a number of advantages. Bitcoins are transferred directly from person to person within the net without going through a bank or a clearing house. This means that the fees are much lower.</p>
    <h3>What is <? php echo $siteName; ?></h3>
    <p><? php echo $siteName; ?> is a Bitcoin Rotator website which you can browse other free Bitcoin faucet easily.</p>
    <h3>How to start?</h3>
    <p>You can start by clicking the "Start" button above. You can also browse our list through "Browse" button too!</p>
  </div>
</div>
<?php endif; ?>

<?php require 'footer.php'; ?>