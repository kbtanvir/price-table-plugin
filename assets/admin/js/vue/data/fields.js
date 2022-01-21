// type options =
//   | ''
//   | 'Unlimited'
//   | '1 User'
//   | '50 Users / 5 Teams'
//   | 'Phone Support'
//   | 'Chat and Email'
//   | 'checked'
//   | 'unchecked'
//   | 'Coming Soon';

// interface item {
//   id: any;
//   name: string;
//   'lite': options;
//   'team': options;
//   'enterprise': options;
//   'header'?: boolean;
// }


const priceTableData = [
  {
    'id': '1',
    'name': 'Usage and Support',
    'lite': '',
    'team': '',
    'enterprise': '',
    'header': true,
  },
  {
    'id': '2',
    'name': 'Number of Documents',
    'lite': 'Unlimited',
    'team': 'Unlimited',
    'enterprise': 'Unlimited',
  },
  {
    'id': '3',
    'name': 'Workspace Users / Teams',
    'lite': '1 User',
    'team': '50 Users / 5 Teams',
    'enterprise': 'Unlimited',
  },
  {
    'id': '4',
    'name': 'Customer Support',
    'lite': 'Chat and Email',
    'team': 'Chat and Email',
    'enterprise': 'Phone Support',
  },
  {
    'id': '5',
    'name': 'Productivity',
    'lite': '',
    'team': '',
    'enterprise': '',
    'header': true,
  },
  {
    'id': '6',
    'name': 'Tixio Wikis',
    'lite': 'checked',
    'team': 'checked',
    'enterprise': 'checked',
  },
  {
    'id': '7',
    'name': 'Tixio Checklists',
    'lite': 'checked',
    'team': 'checked',
    'enterprise': 'checked',
  },
  {
    'id': '8',
    'name': 'Tixio Bookmarks',
    'lite': 'checked',
    'team': 'checked',
    'enterprise': 'checked',
  },
  {
    'id': '9',
    'name': 'Tixio Rich Notes',
    'lite': 'checked',
    'team': 'checked',
    'enterprise': 'checked',
  },
  {
    'id': '10',
    'name': 'Tixio RSS-Feed',
    'lite': 'checked',
    'team': 'checked',
    'enterprise': 'checked',
  },
  {
    'id': '11',
    'name': 'Tixio Bookmark Organizer',
    'lite': 'checked',
    'team': 'checked',
    'enterprise': 'checked',
  },
  {
    'id': '12',
    'name': 'Tixio Multi-Page Embed',
    'lite': 'checked',
    'team': 'checked',
    'enterprise': 'checked',
  },
  {
    'id': '13',
    'name': 'Tixio Fast Switch',
    'lite': 'checked',
    'team': 'checked',
    'enterprise': 'checked',
  },
  {
    'id': '14',
    'name': 'Tixio Chrome extension',
    'lite': 'checked',
    'team': 'checked',
    'enterprise': 'checked',
  },
  {
    'id': '15',
    'name': 'Sharing and collaboration',
    'lite': '',
    'team': '',
    'enterprise': '',
    'header': true,
  },
  {
    'id': '16',
    'name': 'Board and Channel guests',
    'lite': 'unchecked',
    'team': 'checked',
    'enterprise': 'checked',
  },
  {
    'id': '17',
    'name': 'Workspace Sharing',
    'lite': 'unchecked',
    'team': 'checked',
    'enterprise': 'checked',
  },
  {
    'id': '18',
    'name': 'Tixio Analytics',
    'lite': 'unchecked',
    'team': 'Coming Soon',
    'enterprise': 'Coming Soon',
  },
  {
    'id': '19',
    'name': 'Real-time collaboration and commenting',
    'lite': 'unchecked',
    'team': 'Coming Soon',
    'enterprise': 'Coming Soon',
  },
  {
    'id': '20',
    'name': 'Private documents sharing',
    'lite': 'unchecked',
    'team': 'Coming Soon',
    'enterprise': 'Coming Soon',
  },
  {
    'id': '21',
    'name': 'Security and Admin Controls',
    'lite': '',
    'team': '',
    'enterprise': '',
    'header': true,
  },
  {
    'id': '22',
    'name': 'Document-editing Restrictions',
    'lite': 'unchecked',
    'team': 'checked',
    'enterprise': 'checked',
  },
  {
    'id': '23',
    'name': 'Documents history',
    'lite': 'unchecked',
    'team': 'Unlimited',
    'enterprise': 'Unlimited',
  },
  {
    'id': '24',
    'name': 'Users-access restrictions',
    'lite': 'unchecked',
    'team': 'checked',
    'enterprise': 'checked',
  },
  {
    'id': '25',
    'name': 'User-sharing Restrictions',
    'lite': 'unchecked',
    'team': 'checked',
    'enterprise': 'checked',
  },
  {
    'id': '26',
    'name': 'User-invite Restrictions',
    'lite': 'unchecked',
    'team': 'checked',
    'enterprise': 'checked',
  },
  {
    'id': '27',
    'name': 'Usage Dashboard',
    'lite': 'unchecked',
    'team': 'checked',
    'enterprise': 'checked',
  },
  {
    'id': '28',
    'name': 'Guest Users',
    'lite': 'unchecked',
    'team': 'Coming Soon',
    'enterprise': 'Coming Soon',
  },
  {
    'id': '29',
    'name': 'Platforms and Integrations',
    'lite': '',
    'team': '',
    'enterprise': '',
    'header': true,
  },
  {
    'id': '30',
    'name': 'Document Imports from Google Docs, and more.',
    'lite': 'checked',
    'team': 'checked',
    'enterprise': 'checked',
  },
  {
    'id': '31',
    'name': 'Live-embed of Google Drive files',
    'lite': 'unchecked',
    'team': 'checked',
    'enterprise': 'checked',
  },
  {
    'id': '32',
    'name': 'Trello, Asana, Slack and more...',
    'lite': 'Coming Soon',
    'team': 'Coming Soon',
    'enterprise': 'Coming Soon',
  },
  {
    'id': '33',
    'name': 'Web, Desktop, iOS, and Android apps',
    'lite': 'Coming Soon',
    'team': 'Coming Soon',
    'enterprise': 'Coming Soon',
  },
];

// const WP_EP = WP_API.endpoint;