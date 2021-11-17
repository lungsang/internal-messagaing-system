<x-main-layout>
    <div class="email-app mb-4">
        <!-------- Side nav for messages -------->
        @include('messenger.partials.navigation')
        <main class="message vh-100">
            <div class="container-fluid p-0">
                <div class="col-md-10">        
                    <form class="form-horizontal" role="form" action="{{ route('messages.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <select name="recipient"
                                class="form-control">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <input type="text" class="form-control select2-offscreen" type="text" name="subject"
                            :value="old('subject')" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="editor" name="message" ></textarea>
                        </div>
                            
                        <div class="form-group">	
                            <button type="submit" class="btn btn-success">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
    
    @include('components.ckeditor')

</x-main-layout>

