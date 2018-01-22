jQuery(function ($) {
    'use strict'
    var supportsAudio = !!document.createElement('audio').canPlayType;
    if (supportsAudio) {
        var index = 0,
            playing = false,
            mediaPath = '',
            extension = 'mp3',
            tracks = [{
                "track": 1,
                "name": "aaj mausam",
                "length": "6:21",
                "file": "aaj mausam"
            }, {
                "track": 2,
                "name": "aane wala pal",
                "length": "4:42",
                "file": "aane wala pal"
            }, {
                "track": 3,
                "name": "aap ki aankhon",
                "length": "4:07",
                "file": "aap ki aankhon"
            }, {
                "track": 4,
                "name": "aate jaate",
                "length": "5:47",
                "file": "aate jaate"
            }, {
                "track": 5,
                "name": "aaye",
                "length": "5:13",
                "file": "aaye"
            }, {
                "track": 6,
                "name": "chalte",
                "length": "5:14",
                "file": "chalte"
            }, {
                "track": 7,
                "name": "chukar mere",
                "length": "4:19",
                "file": "chukar mere"
            }, {
                "track": 8,
                "name": "chura ke",
                "length": "7:49",
                "file": "chura ke"
            }, {
                "track": 9,
                "name": "dil",
                "length": "5:01",
                "file": "dil"
            }, {
                "track": 10,
                "name": "dil ke jharokhe",
                "length": "6:43",
                "file": "dilke jharokhe"
            }, {
                "track": 11,
                "name": "Dream Girl",
                "length": "5:56",
                "file": "Dream Girl"
            }, {
                "track": 12,
                "name": "duniya mein",
                "length": "5:00",
                "file": "duniya mein"
            }, {
                "track": 13,
                "name": "ek pyaar ka",
                "length": "4.54",
                "file": "ek pyaar ka"
            }, {
                "track": 14,
                "name": "hum bewafa",
                "length": "3:59",
                "file": "hum bewafa"
            }, {
                "track": 15,
                "name": "jab tak",
                "length": "6:59",
                "file": "jab tak"
            }, {
                "track": 16,
                "name": "kabhie sham dhale",
                "length": "8:14",
                "file": "kabhie sham dhale"
            }, {
                "track": 17,
                "name": "kanchi",
                "length": "4:52",
                "file": "kanchi"
            }, {
                "track": 18,
                "name": "karz",
                "length": "7:52",
                "file": "karz"
            }, {
                "track": 19,
                "name": "khuda bhi",
                "length": "4:35",
                "file": "khuda bhi"
            }, {
                "track": 20,
                "name": "maine poocha",
                "length": "5:02",
                "file": "maine poocha"
            }, {
                "track": 21,
                "name": "mera chand",
                "length": "5:50",
                "file": "mera chand"
            }, {
                "track": 22,
                "name": "mere naina",
                "length": "6:07",
                "file": "mere naina"
            }, {
                "track": 23,
                "name": "meri bhigi",
                "length": "4:08",
                "file": "meri bhigi"
            }, {
                "track": 24,
                "name": "o sathi re",
                "length": "4:33",
                "file": "o sathi re"
            }, {
                "track": 25,
                "name": "pal pal dil",
                "length": "5:28",
                "file": "pal pal dil"
            }],
            buildPlaylist = $.each(tracks, function(key, value) {
                var trackNumber = value.track,
                    trackName = value.name,
                    trackLength = value.length;
                if (trackNumber.toString().length === 1) {
                    trackNumber = '0' + trackNumber;
                } else {
                    trackNumber = '' + trackNumber;
                }
                $('#plList').append('<li><div class="plItem"><div class="plNum">' + trackNumber + '.</div><div class="plTitle">' + trackName + '</div><div class="plLength">' + trackLength + '</div></div></li>');
            }),
            trackCount = tracks.length,
            npAction = $('#npAction'),
            npTitle = $('#npTitle'),
            audio = $('#myAudio').bind('play', function () {
                playing = true;
                npAction.text('Now Playing...');
            }).bind('pause', function () {
                playing = false;
                npAction.text('Paused...');
            }).bind('ended', function () {
                npAction.text('Paused...');
                if ((index + 1) < trackCount) {
                    index++;
                    loadTrack(index);
                    audio.play();
                } else {
                    audio.pause();
                    index = 0;
                    loadTrack(index);
                }
            }).get(0),
            btnPrev = $('#btnPrev').click(function () {
                if ((index - 1) > -1) {
                    index--;
                    loadTrack(index);
                    if (playing) {
                        audio.play();
                    }
                } else {
                    audio.pause();
                    index = 0;
                    loadTrack(index);
                }
            }),
            btnNext = $('#btnNext').click(function () {
                if ((index + 1) < trackCount) {
                    index++;
                    loadTrack(index);
                    if (playing) {
                        audio.play();
                    }
                } else {
                    audio.pause();
                    index = 0;
                    loadTrack(index);
                }
            }),
            li = $('#plList li').click(function () {
                var id = parseInt($(this).index());
                if (id !== index) {
                    playTrack(id);
                }
            }),
            loadTrack = function (id) {
                $('.plSel').removeClass('plSel');
                $('#plList li:eq(' + id + ')').addClass('plSel');
                npTitle.text(tracks[id].name);
                index = id;
                audio.src = mediaPath + tracks[id].file + extension;
            },
            playTrack = function (id) {
                loadTrack(id);
                audio.play();
            };
        extension = audio.canPlayType('audio/mpeg') ? '.mp3' : audio.canPlayType('audio/ogg') ? '.ogg' : '';
        loadTrack(index);
    }
});

//initialize plyr
plyr.setup($('#myAudio'), {});
