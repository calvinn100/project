<?php include './includes/header.php'; ?>

                        <h1 class="page-header">
                            About <?=$name?> &nbsp;&nbsp;&nbsp;
                            <i class="fa fa-pencil" data-target="#editCompanyModal" data-toggle="modal" style="font-size: 22px;"></i>
                        </h1>
                        <p><?=$description?></p>


                        <div class="modal fade" id="editCompanyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-body">
                                <form action="../actions.php?action=changeCompanyDesc" method="post">
                                    <input  type="text" class="form-control hidden" name="loginid" value="<?=$loginid?>" >
                                    <input  type="text" class="form-control hidden" name="page" value="./companies/aboutcompany.php" >
                                    <textarea name="aboutCompany" class="form-control" rows="12"  cols="80"><?=$description?></textarea>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>


<?php include './includes/footer.php'; ?>
