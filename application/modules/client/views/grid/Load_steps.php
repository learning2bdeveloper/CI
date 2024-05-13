<body>
    <?php if (!empty($data)) { ?>

        <section class="our-blog p-0 m-0 bg-light">
            <div class="container work-process pb-5 pt-5">
                <!-- <div class="title mb-5 text-center">
                <h3>Our <span class="text-primary">1</span></h3>
            </div> -->
                <?php
                $counter = 0;
                foreach ($data as $step) :
                    $counter++;
                    $processClass = ($counter % 2 == 0) ? 'process-right' : 'process-left';
                ?>
                    <!-- ============ Step <?php echo $step->SequenceNumber; ?> =========== -->
                    <div class="row">
                        <div class="col-md-5 <?php echo $processClass == 'process-left' ? 'order-md-1' : ''; ?>">
                            <div class="process-box <?php echo $processClass; ?>">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="process-step">
                                            <p class="m-0 p-0">Step</p>
                                            <h2 class="m-0 p-0"><?php echo $step->SequenceNumber; ?></h2>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <h5><?php echo $step->StepName; ?></h5>
                                        <!-- <p><small></small></p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-5 <?php echo $processClass == 'process-right' ? 'order-md-1' : ''; ?>">
                            <!-- No point here -->
                        </div>
                    </div>
                    <!-- ============ -->
                <?php endforeach; ?>
            </div>
        </section>
    <?php } else { ?>

        <div>
            <center>
                <h6 style="color:red">No Steps Found.</h6>
            </center>
        </div>
    <?php } ?>
</body>

</html>