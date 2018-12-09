@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class='col-lg-4 offset-lg-4'>
                <h4>Upload Projects File</h4>
                <hr>
                <div>
                    Please select the xml file you wish to load using the form below. The file should be in the following format:
                    <pre lang="xml">
                        <projects>
                          <project>
                            <name>Project 1</name>
                            <description>This is the description of project 1</description>
                          </project>
                          <project>
                            <name>Project 2</name>
                            <description>This is the description of Project 2</description>
                          </project>
                        </projects>
                    </pre>
                </div>

                {!! Form::open(array('route' => 'upload-projects','enctype' => 'multipart/form-data')) !!}
                {!! Form::file('projects_xml_file') !!}
                {!! Form::submit('Load Projects', array('class' => 'btn btn-primary')) !!}
                {!! Form::close() !!}

            </div>
        </div>
    </div>

@endsection