{--    Edit Modal  --}}

<div class="modal fade editCountry" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="{{route('update.timeline.details')}}" method="post" id="update-timeline-form">
                    <input type="hidden" name="Tid">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <h5 class="modal-title" style="font-weight: bold" id="exampleModalLabel">Address</h5>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <h5 class="modal-title" style="font-weight: bold" id="exampleModalLabel">Job Information</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6" style="border-right: 2px solid gray">

                                <div class="form-row">


                                    <div class="form-group col-md-12">
                                        <input type="radio"> Select address
                                        <select name="address" id="address" class="form-control">
                                            <option value="address1">address1</option>
                                            <option value="address2">address2</option>
                                            <option value="address3">address3</option>
                                            <option value="address4">address4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="">Company Name</label>
                                        <input type="text" class="form-control" id="cname" placeholder="">
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="">Contact Person</label>
                                        <input type="text" class="form-control" id="pname" placeholder="">
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">Street</label>
                                        <input type="text" class="form-control" name="street" id="street" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Number</label>
                                        <input type="text" class="form-control" name="number" id="number" placeholder="">
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">Zip Code</label>
                                        <input type="number" class="form-control" name="zipcode" id="zipcode" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">City</label>
                                        <input type="text" class="form-control" name="city" id="city" placeholder="">
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="">Country</label>
                                        <input type="text" class="form-control" name="country" id="country" placeholder="">
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="">Phone</label>
                                        <input type="number" class="form-control" name="phone" id="phone" placeholder="">
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="">
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="">Website</label>
                                        <input type="text" class="form-control" name="website" id="website" placeholder="">
                                    </div>

                                </div>


                            </div>
                            <div class="col-lg-6">

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="">Date</label>
                                        <input type="date" class="form-control" name="date" id="date" placeholder="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">Time</label>
                                        <input type="time" class="form-control" name="time" id="time" placeholder="">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="">PlannedDurationMinutes</label>
                                        <input type="number" class="form-control" name="duratoinminutes" id="duratoinminutes" placeholder="">
                                    </div>

                                </div>
                                <div class="form-row">

                                    <div class="form-group col-md-12">
                                        <label for="">User</label>
                                        <select name="address" id="address" class="form-control">
                                            <option value="user1">user1</option>
                                            <option value="user1">user1</option>
                                            <option value="user1">user1</option>
                                            <option value="user1">user1</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="form-group mb-1">
                                        <label for="exampleTextarea">Detail</label>
                                        <textarea class="form-control" name="detail" cols="50" id="exampleTextarea" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="form-group col-md-6 mb-1">
                                        <label for="exampleTextarea">Note</label>
                                        <textarea class="form-control" name="note" cols="20" id="note" rows="4"></textarea>
                                    </div>
                                    <div class="form-group col-md-6 mb-1">
                                        <label for="exampleTextarea">Note Intern</label>
                                        <textarea class="form-control" name="intern" cols="20" id="intern" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="form-row">

                                    <div class="form-group col-md-3 mb-1">
                                        <label for="exampleTextarea">Price</label>
                                        <input type="text" class="form-control" name="price" id="price" placeholder="">
                                    </div>
                                    <div class="form-group col-md-4 mb-1">
                                        <label for="exampleTextarea">Currency</label>
                                        <select name="currency" id="currency" class="form-control">
                                            <option value="currency1">currency1</option>
                                            <option value="currency1">currency1</option>
                                            <option value="currency1">currency1</option>
                                            <option value="currency1">currency1</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-3 mb-1">
                                        <button type="button" class="btn btn-danger">Cancel</button>
                                    </div>
                                    <div class="form-group col-md-4 mb-1">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </form>


            </div>
        </div>
    </div>
</div>

{{--    Edit Modal End --}}
