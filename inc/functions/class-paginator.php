<?php
 
class Paginator {

    private $limit;
    private $page;
    private $query;
    private $total;
    private $obj;

    public function __construct( $query, $total ) {
        $this->query = $query;         
        $this->total = $total;         
    }

    public function getData( $limit = 10, $page = 1 ) {
     
        $this->limit = ($limit === 'all') ? 'all' : max(1, (int)$limit);
        $this->page = max(1, (int)$page);
     
        if ( $this->limit === 'all' ) {
            $query = $this->query;
        } else {
            $offset = max(0, ( $this->page - 1 ) * $this->limit);
            $query = $this->query . " LIMIT " . $offset . ", " . $this->limit;
        }

        $this->obj = new sQuery();
        $result = $this->obj->executeQuery($query);
          
        return $result;
    }

    public function createLinks( $links, $params, $list_class ) {

        if ( $this->limit === 'all' || (int)$this->total <= 0 || (int)$this->limit <= 0 ) {
            return '';
        }
     
        $last = (int) ceil( (int)$this->total / (int)$this->limit );
        if ( $last <= 1 ) {
            return '';
        }
     
        $currentPage = min(max(1, (int)$this->page), $last);
        $links = max(1, (int)$links);

        $start = ( ( $currentPage - $links ) > 0 ) ? $currentPage - $links : 1;
        $end = ( ( $currentPage + $links ) < $last ) ? $currentPage + $links : $last;
     
        $html = '<div class="' . $list_class . '">';

        if ( $currentPage <= 1 ) {
            $html .= '<a>&laquo;</a>';
        } else {
            $html .= '<a href="?'.$params.'&page=' . ( $currentPage - 1 ) . '">&laquo;</a>';
        }
     
        if ( $start > 1 ) {
            $html .= '<a href="?'.$params.'&page=1">1</a>';
            $html .= '<span>...</span>';
        }
     
        for ( $i = $start ; $i <= $end; $i++ ) {
            if ( $currentPage == $i ) {
                $html .= '<a class="active">' . $i . '</a>';
            } else {
                $html .= '<a href="?'.$params.'&page=' . $i . '">' . $i . '</a>';
            }
        }
     
        if ( $end < $last ) {
            $html .= '<span class="disabled mr-3">...</span>';
            $html .= '<a href="?'.$params.'&page=' . $last . '">' . $last . '</a>';
        }
     
       if ( $currentPage >= $last ) {
           $html .= '<a>&raquo;</a>';
       } else {
           $html .= '<a href="?'.$params.'&page=' . ( $currentPage + 1 ) . '">&raquo;</a>';
       }

        $html .= '</div>';
     
        return $html;

    }

    public function closeConnection(){
        $this->obj->Clean();
		$this->obj->Close();
	} 
 
}