                <div class="offcanvas offcanvas-end w-full w-lg-1/3" data-bs-scroll="true" data-bs-backdrop="true" tabindex="-1" id="offcanvasEditDevice" aria-labelledby="offcanvasEditDeviceLabel">
                    <div class="offcanvas-header border-bottom py-4 bg-surface-secondary">
                        <h5 class="offcanvas-title" id="offcanvasEditDeviceLabel">Edit device</h5>
                        <button type="button" class="btn-close text-reset text-xs" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body vstack gap-5">
                        <form id="addDeviceForm">
                            <div class="row g-5">
                                <div class="col-md-12" style="display: none;">
                                    <div>
                                        <label class="form-label">Device ID</label>
                                        <input type="text" class="form-control" name="device_id" id="device_id" required>
                                    </div>
                                </div>
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
                                <div class="col-md-12">
                                    <label class="form-label">Status</label>
                                    <select class="form-select" name="status" required>
                                        <option selected disabled value="">Select Status</option>
                                        <option value="available">Available</option>
                                        <!-- <option value="assigned">Assigned</option> -->
                                        <option value="faulty">Faulty</option>
                                        <option value="decommissioned">Decommissioned</option>
                                    </select>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary w-full">
                                        Update Device
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>