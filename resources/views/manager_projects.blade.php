<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h3>Manager working on projects</h3>
<table>
	<thead>
		<tr>
			<th>Project</th>
			<th>Users</th>
		</tr>
		<tbody>
			@foreach($projects as $project)
			<tr>
				<td>{{$project->name}}</td>
				<td>
					<ul>
						@foreach($project->managers as $manager)
						<li>
							{{$manager->name}} ----[{{$manager->project_manager->created_at}}]----
						</li>
						@endforeach
					</ul>
				</td>
			</tr>
			@endforeach
		</tbody>
		
	</thead>
</table>
</body>
</html>