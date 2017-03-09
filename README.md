# FAQ module for AsgardCMS 2

## Installation

1. Put a module in "Modules" folder
2. Give permissions to the module.

## Usage

Create a `faq.index` page in your theme.
You will have access to a $questions variable on which you can loop

Example:

```
@if($questions->count() > 0)
    <ul>
        @foreach($questions as $question)
            <li><a href="#question-{{ $question->id }}">{{ $question->question }}</a></li>
        @endforeach
    </ul>
@endif

<div class="answers-container">
    @foreach($questions as $question)
        <div class="faq-question" id="question-{{ $question->id }}">
            <a href="#">{{ $question->question }}</a>
            <div class="faq-answer" style="margin-left: 20px">
                {!! $question->answer !!}
            </div>
        </div>
    @endforeach
</div>
```
