<x-layout>
<form action="{{route('logout')}}" method="POST">
          @csrf
          <button type="submit" class="btn">
            <a class="hover-line">LOGOUT</a>
          </button>
        </form>
</x-layout>