var cards = {};

cards['start'] = new card(
  "start", "ui", null,
  "Start - Getting to where you need",
  "Maybe you already have some steps done and can skip some things in this guide.",
  [{target: 'no-softmod',
    text: `My Wii isn't softmodded (has no Homebrew Channel)`
  },{target: 'prepare-sd',
    text: `I have a Homebrew Channel installed`
  },{target: 'conf-usb-loader',
    text: `I can do USB Loading`
  }]
);

cards['updating'] = new card(
  "updating", "up", null,
  "Updating your Wii",
  "Go into the Wii settings and update your Wii. You need an internet connection for this. Check if your Wii is version 4.3 after this.",
  [{target: 'find-wii-version',
    text: `My Wii is now updated to 4.3`
  },{target: 'disc-updating',
    text: `I can't connect my Wii to the internet or i have a different error.`
  }]
);

cards['fresh-start'] = new card(
  "fresh-start", "fs", null,
  "Fresh Start: Checking your Wii version",
  "In this step we'll check what Wii system menu version your Wii is running and how to update if needed.",
  [{target: 'find-wii-version',
    text: `I don't know what version my Wii has`
  },{target: 'letterbomb',
    text: `My Wii is running version 4.3`
  },{target: 'updating',
    text: `My Wii is running anything below 4.3`
  }]
);

cards['find-wii-version'] = new card(
  "find-wii-version", "fwv", null,
  "Finding your Wii version",
  `In order to find your Wii version you need to go into Settings -> Wii System and you should see your Wii system version at the top right of the screen. The letter at the end tells you which region the Wii is from. U is USA, E is Europe (and Australia and some parts of South America), J is Japane and K is Korea.<br/>If it says 4.3, then your Wii is up to date. If it's lower, it's outdated`,
  [{target: 'letterbomb',
    text: `My version starts with "4.3"`
  },{target: 'updating',
    text: `My version does not start with "4.3"`
  }]
);

cards['updating'] = new card(
  "updating", "up", null,
  "Updating your Wii",
  `Go into the Wii settings and update your Wii. You need an internet connection for this. Check if your Wii is version 4.3 after this.`,
  [{target: 'letterbomb',
    text: `My Wii is now updated to 4.3`
  },{target: 'disc-updating',
    text: `I can't connect my Wii to the internet or i'm getting an error`
  },{target: 'parental-code-removal',
    text: `Parental Access is preventing me from updating or setting up an internet connection`
  }]
);

cards['letterbomb'] = new card(
  "letterbomb", "lb", 'prepare-sd',
  "Using Letterbomb to install the Homebrew Channel",
  `Now we'll be using Letterbomb to actually softmod your Wii and install the Homebrew channel (and BootMii).`
);

cards['prepare-sd'] = new card(
  "prepare-sd", "p-sd", 'prepare-usb',
  "Preparing your SD card",
  ""
);

cards['prepare-usb'] = new card(
  "prepare-usb", "p-usb", 'd2x-cIOS',
  "Preparing your USB device",
  `Put the Brawl ISO on your FAT32 formatted USB device (min. 8GB, max 2TB partition) using the wbfs_file tool`
);

let cardAmount = 0;

for (var key in cards) {
  cardAmount++;
}

console.log(`card.js loaded with ${cardAmount} cards.`);