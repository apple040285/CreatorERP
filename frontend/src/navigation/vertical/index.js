import systemManagement from './systemManagement'
import sharedData from './sharedData'
import purchasingManagement from './purchasingManagement'
import salesManagement from './salesManagement'
import inventoryManagement from './inventoryManagement'
import accountReceivableManagement from './accountReceivableManagement'

export default [
  {
    title: 'Dashboard',
    route: 'dashboard',
    icon: 'HomeIcon',
  },
  ...systemManagement,
  ...sharedData,
  ...purchasingManagement,
  ...salesManagement,
  ...inventoryManagement,
  ...accountReceivableManagement,
  {
    header: 'PERSONAL CENTER',
  },
  {
    title: 'Administrator',
    route: 'Administrator-Information',
    icon: 'UserIcon',
    children: [
      {
        title: 'Information',
        route: 'Administrator-Information',
      },
    ],
  },
]
