                <div class="offcanvas offcanvas-end w-full w-lg-1/3" data-bs-scroll="true" data-bs-backdrop="true" tabindex="-1" id="offcanvasAddNewDevice" aria-labelledby="offcanvasAddNewDeviceLabel">
                    <div class="offcanvas-header border-bottom py-4 bg-surface-secondary">
                        <h5 class="offcanvas-title" id="offcanvasAddNewDeviceLabel">Add new device</h5>
                        <button type="button" class="btn-close text-reset text-xs" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body vstack gap-5">
                        <form id="addDeviceForm">
                            <div class="row g-5">
                                <div class="col-md-12">
                                    <div>
                                        <label class="form-label">Device name</label>
                                        <input type="text" class="form-control" placeholder="Enter device name" name="device_name" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div>
                                        <label class="form-label">Serial number</label>
                                        <input type="text" class="form-control" placeholder="Enter serial number" name="serial_number" required>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary w-full">
                                        <span class="pe-2"><i class="bi bi-plus-square-dotted"></i> </span>Admin New Device
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>