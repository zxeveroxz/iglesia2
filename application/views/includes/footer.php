</div>

<style>
.tipo_cambio_sunat{
    position: fixed;
    bottom: 0px; 
    right: 10px;
    margin: 1px;
}
.tipo_cambio_sunat strong{
    color: #004080;
}
</style>

<span class="tipo_cambio_sunat btn btn-xs btn-default" title="IP"><strong>IP: <?php echo $this->input->ip_address();?></strong></span>

<script src="<?php echo base_url()?>js/jquery.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url()?>js/bootstrap.min.js"></script>

<script src="<?php echo base_url()?>js/bootstrap-select.js"></script>

<script src="<?php echo base_url()?>js/bootstrap-datepicker.min.js"></script>
</body>
</html>