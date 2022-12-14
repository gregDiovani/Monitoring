<?php

session_start();

?>








        <?php require __DIR__ . '/../Partial/rightsidebar.php' ?>




            <main class="dash-content">
                <?php if(isset($_SESSION["success"])){

                   echo '<div class="alert alert-success" role="alert">
                      <h4 class="alert-heading">Penambahan pulsa perhasil</h4>
                    </div> ';

                    unset($_SESSION["success"]);


                }



                ?>

                <?php if(isset($model['data']['error'])) { ?>
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading"><?= $model['data']['error'] ?></h4>
                    </div>
                <?php } ?>
                <div class="container-fluid">

                    <h1 class="dash-title">Tambah Pulsa</h1>
                    <!--<div class="row">
                        <div class="col-xl-6">
                            <div class="card spur-card">
                                <div class="card-header">
                                    <div class="spur-card-icon">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                    <div class="spur-card-title"> Simple Form </div>
                                </div>
                                <div class="card-body ">
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1">Email address</label>
                                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Example select</label>
                                            <select class="form-control" id="exampleFormControlSelect1">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect2">Example multiple select</label>
                                            <select multiple class="form-control" id="exampleFormControlSelect2">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">Example textarea</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card spur-card">
                                <div class="card-header">
                                    <div class="spur-card-icon">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                    <div class="spur-card-title"> Inline Form </div>
                                </div>
                                <div class="card-body ">
                                    <form class="form-inline">
                                        <div class="form-group mb-2">
                                            <label for="staticEmail2" class="sr-only">Email</label>
                                            <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="email@example.com">
                                        </div>
                                        <div class="form-group mx-sm-3 mb-2">
                                            <label for="inputPassword2" class="sr-only">Password</label>
                                            <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                                    </form>
                                </div>
                            </div>
                            <div class="card spur-card">
                                <div class="card-header">
                                    <div class="spur-card-icon">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                    <div class="spur-card-title"> Horizontal Layout </div>
                                </div>
                                <div class="card-body ">
                                    <form>
                                        <div class="form-group row">
                                            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                                            </div>
                                        </div>
                                        <fieldset class="form-group">
                                            <div class="row">
                                                <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                                                <div class="col-sm-10">
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio1">Toggle this custom radio</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio2">Or toggle this other custom radio</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio3">This choice seems interesting</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio4">This one rather outlandish</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="form-group row">
                                            <div class="col-sm-2">Checkbox</div>
                                            <div class="col-sm-10">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                    <label class="custom-control-label" for="customCheck1">Check this custom checkbox</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Sign in</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>-->
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card spur-card">
                                <div class="card-header">
                                    <div class="spur-card-icon">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                    <div class="spur-card-title"> Isi Pulsa </div>
                                </div>
                                <div class="card-body ">
                                    <form method="post" action="/tambah/pulsa">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputState">Kamar</label>
                                                <select  name="id" id="inputState"  class="form-control">

                                                    <?php foreach($model['data']['transaksi'] as  $value) { ?>

                                                        <option value="<?php echo $value['id_kamar'];?>"><?php echo $value['id_kamar'];?></option>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="inputPulsa">Pulsa</label>
                                                <input type="number"  name="pulsa"  class="form-control" min="1500" value="1500" step="100" id="inputPulsa" placeholder="Pulsa">
                                            </div>

                                        <div class="form-group col-md-6">
                                            <label for="Receipt_id">Receipt id</label>
                                            <input type="text" name="receipt_id" class="form-control" id="Receipt_id" placeholder="Tambah Receipt">
                                        </div>
                                        </div>
                                        <!--div class="form-group">
                                            <label for="inputAddress2">Address 2</label>
                                            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputCity">City</label>
                                                <input type="text" class="form-control" id="inputCity">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputState">State</label>
                                                <select id="inputState" class="form-control">
                                                    <option selected>Choose...</option>
                                                    <option>...</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="inputZip">Zip</label>
                                                <input type="text" class="form-control" id="inputZip">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck4">
                                                <label class="custom-control-label" for="customCheck4">Check this custom checkbox</label>
                                            </div>
                                        </div>-->
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>




