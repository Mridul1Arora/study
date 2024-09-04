@extends('layout.app')

@section('title', 'User')

@section('content')
<div class="col-md-6 col-12">
    <div class="card mb-6">
        <h5 class="card-header">Roles Hierarchy</h5>
        <div class="card-body">
            <div id="jstree-context-menu" class="overflow-auto jstree jstree-3 jstree-default" role="tree" aria-multiselectable="true" tabindex="0" aria-activedescendant="j3_6" aria-busy="false">
                <ul class="jstree-container-ul jstree-children jstree-contextmenu" role="presentation">
                    @php
                        function renderRoleHierarchyWithContextMenu($role, $level = 1) {
                            $id = 'j3_' . uniqid();
                            $url = url('roles/show', ['id' => $role['role']->id]);
                            $state = empty($role['children']) ? 'jstree-leaf' : 'jstree-open';

                            // Select icons based on level
                            $iconClass = match ($level) {
                                1 => 'ri-folder-3-line text-primary',
                                2 => 'ri-folder-line text-warning',
                                default => 'ri-file-list-2-fill text-success'
                            };

                            // Output the list item
                            echo '<li role="none" id="' . $id . '" class="jstree-node ' . $state . '">';
                            echo '<i class="jstree-icon jstree-ocl" role="presentation"></i>';
                            echo '<a class="jstree-anchor" href="' . $url . '" tabindex="-1" role="treeitem" aria-selected="false" aria-level="' . $level . '" aria-expanded="true" id="' . $id . '_anchor">';
                            echo '<i class="jstree-icon jstree-themeicon ' . $iconClass . ' jstree-themeicon-custom" role="presentation"></i>' . $role['role']->name . '</a>';

                            // Recursively render child roles if any
                            if (!empty($role['children'])) {
                                echo '<ul role="group" class="jstree-children">';
                                foreach ($role['children'] as $child) {
                                    renderRoleHierarchyWithContextMenu($child, $level + 1);
                                }
                                echo '</ul>';
                            }

                            echo '</li>';
                        }

                        // Render the top-level role hierarchy with context menu
                        renderRoleHierarchyWithContextMenu($hierarchy);
                    @endphp
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
