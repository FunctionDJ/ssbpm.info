cards = [
  {
    id: 'updating', short: 'up',
    prev: '', next: '',
    title: 'Updating your Wii',
    text: 'Go into the Wii settings and update your Wii. You need an internet connection for this. Check if your Wii is version 4.3 after this.',
    choices: [
      {
        target: 'find-wii-version',
        text: 'My Wii is now updated to 4.3'
      },
      {
        target: 'disc-updating',
        text: `I can't connect my Wii to the internet or i have a different error.`
      }
    ]
  },
  {
    id: 'start', short: 'start',
    title: 'Start - Getting to where you need',
    text: 'Maybe you already have some steps done and can skip some things in tthis guide',
    choices: [
      {
        target: 'no-softmod',
        text: `My Wii isn't softmodded (has no Homebrew Channel)`
      },
      {
        target: 'prepare-sd',
        text: `I have a Homebrew Channel installed`
      },
      {
        target: 'conf-usb-loader',
        text: `I can do USB Loading`
      }
    ]
  },
  {
    id: 'fresh-start', short: 'fs',
    title: `Fresh Start: Checking your Wii version`,
    text: `In tthis step we'll check what Wii system menu version your Wii is running and how to update if needed.`,
    choices: [
      {
        target: 'find-wii-version',
        text: `I don't know what version my Wii has`
      },
      {
        target: 'letterbomb',
        text: `My Wii is running version 4.3`
      },
      {
        target: 'updating',
        text: `My Wii is running anything below 4.3`
      }
    ]
  },
  {
    id: 'find-wii-version', short: 'fwv',
    title: `Finding your Wii version`,
    text: `In order to find your Wii version you need to go into Settings -> Wii System and you should see your Wii system version at the top right of the screen. The letter at the end tells you which region the Wii is from. U is USA, E is Europe (and Australia and some parts of South America), J is Japane and K is Korea.<br/>If it says 4.3, then your Wii is up to date. If it's lower, it's outdated.`,
    choices: [
      {
        target: 'letterbomb',
        text: `My version starts with "4.3"`
      },
      {
        target: 'updating',
        text: `My version does not start with "4.3"`
      }
    ]
  },
  {
    id: 'updating', short: 'up',
    title: 'Updating your Wii',
    text: `Go into the Wii settings and update your Wii. You need an internet connection for this. Check if your Wii is version 4.3 after this.`,
    choices: [
      {
        target: 'letterbomb',
        text: `My Wii is now updated to 4.3`
      },
      {
        target: 'disc-updating',
        text: `I can't connect my Wii to the internet or i'm getting an error`
      },
      {
        target: 'parental-code-removal',
        text: `Parental Access is preventing me from updating or setting up an internet connection`
      }
    ]
  },
  {
    id: 'letterbomb', short: 'lb',
    next: 'prepare-sd',
    title: `Using Letterbomb to install the Homebrew Channel`,
    text: `Now we'll be using Letterbomb to actually softmod your Wii and install the Homebrew channel (and BootMii).`
  },
  {
    id: 'prepare-sd', short: 'p-sd',
    prev: 'letterbomb', next: 'prepare-usb',
    title: `Preparing your SD card`,
    text: ``
  },
  {
    id: 'prepare-usb', short: 'p-usb',
    prev: 'prepare-sd', next: 'd2x-cios',
    title: `Preparing your USB device`,
    text: `Put the Brawl ISO on your FAT32 formatted USB device (min. 8GB, max 2TB partition) using the wbfs_file tool`
  }
];