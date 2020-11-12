@props(['seconds'])

<span x-data="{
    time: {{ $seconds }},
    startCounter: function() {
        let runningCounter = setInterval(() => {
            if(this.time < 0) {
                clearInterval(runningCounter)
                return;
            }
            this.time = this.time - 1;
        }, 1000);
    },
    countdown: function(){
        return humanizeDuration(this.time * 1000, {
            largest: 2,
            language: 'shortEn',
            languages: {
                shortEn: {
                    y: () => 'y',
                    mo: () => 'mo',
                    w: () => 'w',
                    d: () => 'd',
                    h: () => 'h',
                    m: () => 'm',
                    s: () => 's',
                    ms: () => 'ms',
                    },
            },
            serialComma: false,
            conjunction: ' '
        });
    }
}"
x-init="startCounter()"
{{ $attributes }}
x-text="countdown()"
>

    
</span>
