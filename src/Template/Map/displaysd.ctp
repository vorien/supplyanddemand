<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#distributions" aria-controls="distributions" role="tab" data-toggle="tab">Supply and Demand</a></li>
    <li role="presentation"><a href="#inventory" aria-controls="inventory" role="tab" data-toggle="tab">Inventory</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="distributions"><?php echo $this->element('displaydistributions');?></div>
    <div role="tabpanel" class="tab-pane" id="inventory"><?php echo $this->element('displayinventories');?></div>
  </div>

</div>
