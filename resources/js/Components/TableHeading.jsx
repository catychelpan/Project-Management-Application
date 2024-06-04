import {ChevronUpIcon, ChevronDownIcon} from '@heroicons/react/16/solid';


export default function TableHeading({
    field_name,
    isSortable = true,
    sort_field = null,
    sort_direction = null,
    sortChanged = () => {},
    children,
}) {
    return(
        <th onClick={e => sortChanged(field_name)} className="">
            <div className="px-3 py-3 flex items-center justify-betwee gap-1 cursor-pointer ">
                {children}
                {isSortable && (
                    <div>
                        <ChevronUpIcon className={`w-4 ${(sort_field === field_name  && sort_direction === 'asc') ? 'text-[#0096FF]' : ''}`}/>
                        <ChevronDownIcon className={`w-4 -mt-2 ${(sort_field === field_name && sort_direction === 'desc') ? 'text-[#0096FF]' : ''}`}/>
                    </div>
                )}

            </div>
        </th>
    )
}
