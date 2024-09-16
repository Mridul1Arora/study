<div class="form-group">
    <label for="lead_source">Lead Source</label>
    <input type="text" name="lead_source" id="lead_source" class="form-control" value="{{ old('lead_source', $lead->lead_source ?? '') }}" required>
</div>

<div class="form-group">
    <label for="lead_owner">Lead Owner</label>
    <input type="text" name="lead_owner" id="lead_owner" class="form-control" value="{{ old('lead_owner', $lead->lead_owner ?? '') }}" required>
</div>

<div class="form-group">
    <label for="first_name">First Name</label>
    <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name', $lead->first_name ?? '') }}" required>
</div>

<div class="form-group">
    <label for="last_name">Last Name</label>
    <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name', $lead->last_name ?? '') }}" required>
</div>

<div class="form-group">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" class="form-control" value="{{ old('username', $lead->username ?? '') }}" required>
</div>


<div class="form-group">
    <label for="email">Email</label>
    @can('update email field')
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $lead->email ?? '') }}" required>
    @else
        <input type="email" id="email" class="form-control" value="{{ old('email', $lead->email ?? '') }}" readonly>
    @endcan
</div>

<div class="form-group">
    <label for="address">Address</label>
    <textarea name="address" id="address" class="form-control">{{ old('address', $lead->address ?? '') }}</textarea>
</div>

<div class="form-group">
    <label for="mobile_no">Mobile No.</label>
    <input type="text" name="mobile_no" id="mobile_no" class="form-control" value="{{ old('mobile_no', $lead->mobile_no ?? '') }}">
</div>

<div class="form-group">
    <label for="state">State</label>
    <input type="text" name="state" id="state" class="form-control" value="{{ old('state', $lead->state ?? '') }}">
</div>

<div class="form-group">
    <label for="lead_status">Lead Status</label>
    <input type="text" name="lead_status" id="lead_status" class="form-control" value="{{ old('lead_status', $lead->lead_status ?? '') }}">
</div>

<div class="form-group">
    <label for="remark">Remark</label>
    <textarea name="remark" id="remark" class="form-control">{{ old('remark', $lead->remark ?? '') }}</textarea>
</div>

<div class="form-group">
    <label for="lead_priority">Lead Priority</label>
    <input type="text" name="lead_priority" id="lead_priority" class="form-control" value="{{ old('lead_priority', $lead->lead_priority ?? '') }}">
</div>

<div class="form-group">
    <label for="current_stage">Current Stage</label>
    <input type="text" name="current_stage" id="current_stage" class="form-control" value="{{ old('current_stage', $lead->current_stage ?? '') }}">
</div>
