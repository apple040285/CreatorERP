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
    icon: 'ToolIcon',
    children: [
      {
        title: 'Information',
        route: 'Administrator-Information',
      },
    ],
  },
]
